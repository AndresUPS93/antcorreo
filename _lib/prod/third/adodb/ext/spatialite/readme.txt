Abs         - returns the absolute value of x
Acos        - returns the arc cosine of x, that is, the value whose cosine is x
              returns NULL if x is not in the range -1 to 1
Asin        - returns the arc sine of x, that is, the value whose sine is x
              returns NULL if x is not in the range -1 to 1
Atan        - returns the arc tangent of x, that is, the value whose tangent is x
Atan2       - returns the principal value of the arc tangent of y/x in radians, using the signs of the two arguments to determine the quadrant of the result. The eturn value is in the range[-pi, pi].
Ceil        - returns the smallest integer value not less than x
Ceiling     - returns the smallest integer value not less than x
Cos         - returns the cosine of x, where x is given in radians
Cot         - returns the cotangent of x, where x is given in radians
Degrees     - returns the argument x, converted from radians to degrees
Exp         - returns the value of e (the base of natural logarithms) raised to the power of x
              the inverse of this function is Log() (using a single argument only) or Ln()
Floor       - returns the largest integer value not greater than x
Ln          - returns the natural logarithm of x; that is, the base-e logarithm of x
              If x is less than or equal to 0, then NULL is returned
Log         - returns the natural logarithm of x; that is, the base-e logarithm of x
              If x is less than or equal to 0, then NULL is returned
            - returns the logarithm of x to the base b
              If x is less than or equal to 0, or if b is less than or equal to 1, then NULL is returned
              Log(b, x) is equivalent to Log(x) / Log(b)
Log2        - returns the base-2 logarithm of x Log2(x) is equivalent to Log(x) / Log(2)
Log10       - returns the base-10 logarithm of x Log10(x) is equivalent to Log(x) / Log(10)
PI          - returns the value of PI
Pow
Power       - returns the value of x raised to the power of y
Radians     - returns the argument x, converted from degrees to radians
Sign        - returns the sign of the argument as -1, 0, or 1, depending on whether x is negative, zero, or positive.
Sin         - returns the sine of x, where x is given in radians
Sqrt        - returns the square root of a non-negative number x
Stddev_pop  - returns the population standard deviation of the input values
Stddev_samp - returns the sample standard deviation of the input values
Tan         - returns the tangent of x, where x is given in radians
Var_pop     - returns the population variance of the input values (square of the population standard deviation)
Var_samp    - returns the sample variance of the input values (square of the sample standard deviation)