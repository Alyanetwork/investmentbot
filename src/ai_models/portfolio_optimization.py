import numpy as np
import pandas as pd
from scipy.optimize import minimize

def optimize_portfolio(returns_data):
    returns = pd.read_csv(returns_data).pct_change().dropna()
    cov_matrix = returns.cov()

    def portfolio_variance(weights):
        return np.dot(weights.T, np.dot(cov_matrix, weights))

    constraints = ({'type': 'eq', 'fun': lambda x: np.sum(x) - 1})
    bounds = tuple((0, 1) for _ in range(len(returns.columns)))
    initial_weights = len(returns.columns) * [1 / len(returns.columns)]

    optimized = minimize(portfolio_variance, initial_weights, bounds=bounds, constraints=constraints)
    return optimized.x
