# Using Serialize

## sleep and Wakeup

These magic methods keep an object working in the background.  When the serialize function is called, an object 
is converted into a string of data, it's no longer an object.

Typical use cases are logging tasks, closing file systems, or closing a database connection.  __sleep closes 
all of these and then __wakeup will reopen files and database connections.

If no __sleep() function is present, PHP will automatically save all variables.  Private and protected properties 
will have special encodings around them.

