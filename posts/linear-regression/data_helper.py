import numpy as np
import numpy.typing as npt


def generate_points(w: npt.ArrayLike, mu: float, sigma: float) -> np.array:
    xs = np.random.uniform(-1, 1, size=(100, w.shape[0])) * 50
    xs[:, 0] = 1
    ys = w @ xs.T + np.random.normal(mu, sigma, 100)
    return np.c_[xs, ys]


# w = np.array([5, -2])
# data = generate_data(w, 0, 7)

# df = pd.DataFrame(data, columns=['x1', 'x2', 'y'])
# df['y_hat'] = df[['x1', 'x2']].apply(lambda x: w @ x, axis=1)
# ax = df.plot.scatter(x='x2', y='y', style='b')
# # df.plot.line(x='x2', y='y_hat', ax=ax, style='b')
