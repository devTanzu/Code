import math

def f(xi):
    return(xi - (math.exp(-1*xi) - xi)/(- math.exp(-1*xi)-1))

xi = 0
xnew = f(xi)
print(xnew)

es = 0.1
ea = 1
while ea > es:
    xi = xnew
    xnew = f(xi)
    ea = (xnew - xi)/xnew * 100
    ea = abs(ea)
    print(xi,'---', ea)
