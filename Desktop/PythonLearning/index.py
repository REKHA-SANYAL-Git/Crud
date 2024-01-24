#hello print
print("Hello!")

# intendation
if 5>2:
 print(5)

 #creating variables
    
    #number variable
a=15
print(a)

    #string variable
b="Ami"
print(b)

#Type Casting
c=float(3)
print(c)

#print the type
d=10
print(type(d))
e="Python"
print(type(e))

#case sensitive
f=30
F="Sikhchhi"
print(f)
print(F)

#variable in different cases
myName="Rekha" #camel case
MyName="Rubi" #pascal case
My_Name="Rani" #snake case

print(myName)
print(MyName)
print(My_Name)

#assigning multiple values
g,h,i = "Game","Horse",9
print(g)
print(h)
print(i)


#assigning same value on multiple variables
j=k=l="Jackle"
print(j)
print(k)
print(l)

#unpack a collection
fruits= ["banana","apple"] 
m,n=fruits
print(m)
print(n)

#output variables

#print function
o="owl"
print(o)

#output multiple variables using (,)
p="I am"
q="learning"
r="python"
print(p, q, r)

#output multiple variables using(+)
s="Python "
t="is "
u="awesome."
print(s+t+u)

# + as mathematical operation
v=5
w=7
print(v+w)

#Global variables
x="great"

def myfunc():
  print('Python is '+ x)

myfunc()

#Global and local variables
y="unhealthy"

def myfunc():
  y= "bad"
  print('Cold drink is '+ y)

myfunc()
print('Cold drink is '+ y)

#Global keyword
def myfunc():
  global z
  z = "fantastic"

myfunc()

print("Python is " + z)

Z="great"
def myfunc():
  global Z
  Z = "awesome"

myfunc()

print("Python is " + Z)


#python data types

 #built in data types
data1=5
print(type(data1)) # integer

data2="hello"
print(type(data2)) # string

data3=4.5
print(type(data3)) # float

data4=1j
print(type(data4)) # complex

data5 = ["apple", "banana", "cherry"]
print(type(data5)) # list

data6 = ("apple", "banana", "cherry")
print(type(data6)) # tuple 

data7= range(6)
print(type(data7)) # range

data8= {"name" : "John", "age" : 36}
print(type(data8)) # dict

data9 = {"apple", "banana", "cherry"}
print(type(data9)) # set

data10 = frozenset({"apple", "banana", "cherry"})
print(type(data10)) # frozenset


data11 = True
print(type(data11)) # bool

data12 = b"Hello"
print(type(data12)) # bytes

data13 = bytearray(5)
print(type(data13)) # bytearray

data14 = memoryview(bytearray(5))
print(type(data14)) # memoryview

data15 = None
print(type(data15)) # NoneType


#python numbers 

data16 = 14
print(type(data16)) # int

data17 = 14.5
print(type(data17)) # float


# Complex numbers are written with a "j" as the imaginary part
data18 =  1j
print(type(data18)) # complex

# Type Conversion

# conversion into float
data19 =  20
data20= float(data19)
print(data20) 
print(type(data20)) 

# conversion into int
data21 =  20.7
data22= int(data21)
print(data22) 
print(type(data22)) 

# conversion into complex from int
data23 =  15
data24= complex(data23)
print(data24) 
print(type(data24)) 

# conversion into complex from float
data25 =  20.7
data26= complex(data25)
print(data26) 
print(type(data26)) 

# casting

# casting into int
data27 = int(20.7) 
print(data27) 

data28 = int(22) 
print(data28) 

data29 = int("29") 
print(data29)

# casting into float
data30 = float(31) 
print(data30)

data31 = float(31.9) 
print(data31)

data32 = float("31") 
print(data32)

