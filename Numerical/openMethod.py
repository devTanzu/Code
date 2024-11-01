import math

def f(x):
    return math.exp(-1*x)

x = 0
xnew = f(x)
print(xnew)

es = 0.5
ea = 1

while ea > es: 
  x = xnew
  xnew = f(x)
  ea = (xnew - x)/xnew *100
  ea = abs(ea)
  print(xnew,'---',ea)