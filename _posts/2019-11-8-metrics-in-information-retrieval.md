---
title: Metrics in Information retrieval
date: 2019-11-08 00:00:00 Z
tags: [Information Retrieval, data science]
catagories: [Information Retrieval, data science]
layout: post
excerpt: How to evaluate Ad-hoc retrieval systems
comments: true
---

# Information Retrieval

Information Retrieval is a field of computer science that, as the name suggests,
is about returning information from a corpus based on context. The context can
include a query, the user location, time, etc. The result can either be members
of the corpus or some new document that is a combination of information in the
corpus.

## Ad-Hoc retrieval

<figure>
<a href="/assets/img/information_retrieval/ir_example.png">
<img src="/assets/img/information_retrieval/ir_example.png">
</a>
<figcaption>Example of Ad-Hoc retrieval: We present a query to the IR system
which then retrieves documents from the corpus related to the query.
</figcaption>
</figure>

Ad hoc retrieval is the task of taking some query and returning a ranked list
of relevant documents. The steps of this process is first to convert the query
to some features based on the text of the query and perhaps also the location,
time, date, etc. of the query. We must then rank the documents according to the
query, this ranking can be influenced both the contents of the document and it's  
metadata for instance how popular the document is or how recent it is.

The purpose of this post is not to describe how to design such a system, that
post can be found here:
[Implementing ad-hoc retrieval](/implementing-ad-hoc-retrival/), but instead to
describe how such a system should perform.

> In general I find it helpful to
> reason about properties and metrics used for a problem before diving into the
> implementation.

## A good IR system

How do we construct a good IR system? Below we list a series of properties that
are desirable for an IR system.

-   **Semantic Understanding:** The ability to understand the meaning and
    connections between terms. If we search for:"Data-science programming
    languages" we expect results to contain python and R although they are not
    explicitly mentioned in the query.

-   **Robustness to rare inputs:** Some queries contain terms that might have only
    been seen a few times or perhaps never before. The systems must be able to
    handle this. Either by focusing on the terms in the query it has seen before
    or use the meta data.

-   **Robustness to corpus variance:** The underlying corpus can change over
    time. For instance the answer to "Who is the president of the US" changes
    every 4 to 8 years.

-   **Robustness to variable length inputs:**
    The length of documents in the corpus can vary, a good IR systems handles
    this in such a way that document length alone doesn't influence relevance.
    For instance if we have a 5000 and 100 word document that mentions word x,
    10 and 5 times respectively how do we judge relevance? If we only count word
    occurrences the first document is chosen. If we normalize for document
    length we get the second document.

-   **Robustness to input errors:**
    The system must be able to handle spelling errors, missing words such as
    "the, a" etc.

## Metrics of information systems.

The properties above while desirable are hard to quantify, our goal is to find
some numeric metrics where we can compare systems. Let's formulate the problem
explicitly:

> We are given a corpus of documents we call this set $$D$$, from which we construct
> a model. This model takes a query $$q$$ and must then return a ranked list of
> documents we call this list $$R_q$$.

What does it mean to perform well in the above definition? If we use $$R$$ to
denote a relevant document and $$I$$ to denote an irrelevant one we can look at
two rankings:

$$
Rank1: (R, R, I, I, R) \\
Rank2: (I, I, R, I, I) \\
$$

### Precision & Recall

Rank 1 has 3 relevant rankings while rank 2 has 1. Using the sum of relevant
rankings seams a good starting point to measure performance. To make it a proper
metric we would like to have a general formula and be in a known interval such
as $$[0,1]$$. We can achieve this by normalizing the sum by dividing by the
ideal solution, which is equal to the length of the list since it only countians
relevant documents.
This metric is called the _precision_ and for the query $$q$$ it's formulated as:

$$
  precision(q, R_q) = \frac{\sum_{d \in R_{q}}rel(d,q)}{ |R_q| }
$$

The function $$rel(d, q)$$ is new, it is a binary indicator function that returns
$$1$$ if the document $$d$$ is relevant to the query $$q$$ and $$0$$ otherwise.

We now have our first metric, before we jump in and code a system we should take
a step back and see if our metric can be abused. If I'm confident that one
document is relevant to the query I can get a precision score of 1 if I only
return the document. This is equivalent to google when given the query "Berlin"
returning only the wikipedia article for Berlin. The result has a perfect score
according to our metric, but it does not feel correct.

We also want our system to be rewarded for returning multiple relevant documents.
As with the precision we take the ratio between relevant documents in the
ranking and relevant documents in the corpus. For our example with the two
systems above, if we say that the corpus had 4 relevant documents for the query.
The ratio is Rank1: $$\frac{3}{4}$$ and Rank2: $$\frac{1}{4}$$. This metric is
called the _recall_ and can be formulated as:

$$
  recall(q, R_q) = \frac{\sum_{d \in R_{q}}rel(d,q)}{\sum_{d \in D}rel(d,q)}
$$

The recall of a system can also be gamed, when given a query we need not read it
instead we return the entire corpus as our ranking. We know that every relevant
document is in it and thus have perfect recall.

As seen by their formulas and flaws precision and recall are two sides of the
same coin. On their own they can't guarantee to accurately measure the
performance of a system. But in combination the two metrics gives a good
indicator, if both the recall and precision is close to 1, we know that most of
our ranking contained relevant documents, and that most of the relevant
documents in the corpus was in the ranking.

### Order based metrics.

#### Reciprocal Ranking

Precision and recall do not take the order of the ranking into account. The
ranking $$(R, R, I, I)$$ has a recall and precision of $$0.5$$. If we
reverse the ranking $$(I, I, R, R)$$ the scores do not change. This seams wrong.
We would like our metric to reward placing relevant documents first in the
ranking. We let $$i$$ be the placement of a document in the ranking. $$i=1$$
means that it is the first document in the ranking. We compute the so called
reciprocal ranking (RR) for the query as:

$$
   RR(q, R_q) = \max_{(i,d) \in R_q} \frac{rel(d, q)}{i}
$$

The RR scores for the two rankings $$(R, R, I)$$ and $$(I, R, R)$$ are
$$\frac{1}{1}$$ for the first case and $$\frac{1}{2}$$ for the second.

While it does add extra information to our two other metrics $$RR(q)$$ has the
problem that the two rankings $$(R, I, I, R)$$ and $$(R, R, I, I)$$ still has the
same score although the second is better. We improve our once metric again.

#### Average precision

We want each relvant document to contribute to the score in a way proportional
to its' place in the ranking. We turn back to our first metric, the precision,
if we compute at each step in the ranking and average them out we get our
desired effect. We compute the average precision (AP) for the query by:

$$
  AP(q, R_q) = \frac{1}{\sum_{d \in D} rel(d, q)} \sum_{(i,d) \in R_q}
    Precison(q_i, R_{q,i}) \times rel(d,q)
$$

We let $$R_{q,i}$$ be the $$i$$ first elements of the ranking of $$q$$. The
formula is becoming a bit more complex and more cumbersome to write. In the
following example we omit the cases where $$rel(d,q) = 0$$ since they won't
contribute to the sum. Given the two ranks below we compute their average
precision.

$$
 (R, I, I, R) = \left(\frac{1}{1} + \frac{2}{4}\right) \frac{1}{4} = 0.375\\\\
 (R, R, I, I)= \left(\frac{1}{1} + \frac{2}{2}\right) \frac{1}{4} = 0.5
$$

Thus we have a metric that takes the order of entire ranking into account.

### Average based metrics:

In the above examples we only took a single query into account, which doesn't
represent the system's general performance. To get the performance of an entire
system we should take the mean of the metric over many queries. The mean average
precision or the MAP of a system is a popular metric for when a system had a
binary relevance function.

### Non binary relevance functions

Modeling a ranking as a series of $$R$$'s' and $$I$$'s has its' limits, we can
model that relevance on a scale. Let's say that instead of getting a binary
relevance function we instead get a score in some interval $[0, n]$ where $0$
indicates not relevant and $$n$$ indicates most relevant we can use the discounted
cumulative gain (DCG):

$$
  DCG(q, R_q) = \sum_{(i, d)\in R_q} \frac{2^{rel_q(d)} -1}{\log_2(i+1)}
$$

Let's do an example again and compare two ranks on the scale of $$0$$, to $$2$$.

$$
  (2, 0, 1) = \frac{2^2 -1}{log_2(1 +1)} + \frac{2^0-1}{log_2(2 +1)} +
    \frac{2^2-1}{log_2(3 +1)} = 3.5 \\~\\
  (1, 2, 0)  =\frac{2^1 -1}{log_2(1 +1)} + \frac{2^2-1}{log_2(2 +1)} +
    \frac{2^0-1}{log_2(3 +1)} = 2.89
$$

We see that the first solution which put the higher rank function first got the
higher score. But the result is no longer a metric between $$0$$ and $$1$$. To
achieve this we divide by the ideal (IDCG), in our case the ideal score would be

$$
  (2, 2, 2) = \frac{2^2 -1}{log_2(1 +1)} + \frac{2^2-1}{log_2(2 +1)} +
    \frac{2^2-1}{log_2(3 +1)} = 6.39
$$

We divide our results by the values and get that $$NDCG(q, 2, 0, 1) \simeq 0.55$$ and
$$NDCG(q, 1, 2, 0) \simeq 0.45$$

### Conclusion

We now know how to compare and measure the performance of different Ad-hoc
retrieval models. This understanding should make it easier to understand the
models since we now understand the metrics that they will be subject to.

> The inspiration for this post came from the book
> [Neural Information Retrieval][book], check it out if you want to read more.

[book]: https://www.microsoft.com/en-us/research/uploads/prod/2017/06/INR-061-Mitra-neuralir-intro.pdf
