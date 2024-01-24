# string
print("Hello Python")
print('Hi Python')

# assigning string into variables
data1="Hello Python"
print(data1)

# for multiple line string , we need """ """ or ''' '''sign
data2="""Lorem ipsum dolor sit amet,
consectetur adipiscing elit,
sed do eiusmod tempor incididunt
ut labore et dolore magna aliqua."""
print(data2)

data3="Hii Python"
print(data3[1])

for data4 in "banana":
  print(data4)

# len is used to count length of string
data5 = "Hello, World!"
print(len(data5))

data6 = "The best things in life have to be achieved!"
print("free" in data6)
print("achieved" in data6)

data7 = "The best things in life should not be accessed easily!"
if "easily" in data7:
  print("Yes, 'easily' is present.")

data8 = "The best things in life should not free!"
print("expensive" not in data8)

data9 = "The best things in life should not be accessed easily!"
if "laboriously" not in data9:
  print("No, 'laboriously' is not present.")

  # slicing strings
  data10 = "Hello, World!"
print(data10[2:5])

# slicing from index
data11= "Hello, World!"
print(data11[:5])

# slicing to end
data12= "Hello, World!"
print(data12[1:])

data13 = "Hello, World!"
print(data13[-5:-2])

# upper
data14 = "Hello, World!"
print(data14.upper())

# lower
data15 = "Hello, Python!"
print(data15.lower())

# remove whitespace
data16 = "  Hello, Python!"
print(data16.strip())

# replace 
data17 = "  Hello, Python!"
print(data17.replace("l","k"))

# split
data18 = "Hello, World!"
data19 = data18.split(",")
print(data19)


# concatenate

# merge two variables into another variable
data20 = "Hello"
data21 = "World"
data22 = data20 + data21
print(data22)

# merge two variables into another variable with whitespace
data23 = "Hello"
data24 = "World"
data25 = data23 +" "+data24
print(data25)


# string format

# combine string and number

#  age = 36
# data26 = "My name is John, I am " + age
# print(data26)
# *** above will throw error ***

# format is used to merge string and number
age = 36
data26 = "My name is John, and I am {}"
print(data26.format(age))

# format is used to take unlimited arguments and place them in their respective positions
quantity = 3
itemno = 567
price = 49.95
myorder = "I want {} pieces of item {} for {} dollars."
print(myorder.format(quantity, itemno, price))

# using index numbers {0} to be sure the arguments are placed in the correct placeholders
quantity = 3
itemno = 567
price = 49.95
myorder = "I want {2} pieces of item {0} for {1} dollars."
print(myorder.format(quantity, itemno, price))

# excape character

# backlash is used to insert illegal character in string

# double quote
data27 = "We are the so-called \"Vikings\" from the north."
print(data27) 

# single quote
data28 = 'It\'s alright.'
print(data28)

# New Line
data29 = "Hello\nWorld!"
print(data29)

# Carriage Return
data30 = "Hello\rWorld!"
print(data30)

# tab
data31 = "Hello\tWorld!"
print(data31) 

# backspace
data32 = "Hello \bWorld!"
print(data32) 

#A backslash followed by three integers will result in a octal value:
data33 = "\110\145\154\154\157"
print(data33) 

#A backslash followed by an 'x' and a hex number represents a hex value:
data34 = "\x48\x65\x6c\x6c\x6f"
print(data34) 
