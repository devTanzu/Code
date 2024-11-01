import math
def f(x):
    return math.exp(-1*x) - x

def secant(xi_1, xi):
    return(xi - (f(xi)*(xi_1-xi))/(f(xi_1)-f(xi)))

xi_1 = 0
xi = 1
xnew = secant(xi_1,xi)
print(xnew)

es = 0.1
ea = 1

while ea > es:
    xi_1 = xi
    xi = xnew
    xnew = secant(xi_1,xi)
    ea = (xnew - xi)/xnew * 100
    ea = abs(ea)
    print(xi,'---',ea)