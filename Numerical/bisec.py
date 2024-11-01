import math
g = 9.8
m = 68.1
t = 10
v = 40

def f(c):
    return(g * m / c) * (1 - math.exp(-1 *(c / m) * t)) - v

es = 0.5
xl = 12
xu = 16
xr = (xl + xu) / 2


ea = 1
while ea > es:
    xr_old = xr
    fxl = f(xl)
    fxr = f(xr)
    if fxl * fxr < 0:
        xu = xr
    elif fxl * fxr > 0:
        xl = xr
        xr = (xl + xu) / 2
        ea = abs((xr - xr_old) / xr) * 100
        print([xr, ea])
