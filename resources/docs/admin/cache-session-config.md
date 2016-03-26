# Cache & Session Configuration

By default BookStack will use a file system cache that's storage in the `storage/framework` folder. This is also used to store user session data. Below are some alternative systems that can be used for caching & sessions.

### Memcached

To use memcached for caching and/or sessions open up your `.env` file and find the `CACHE_DRIVER` & `SESSION_DRIVER` variables. By default these are both set to `file`. Change these variables to `memcached`. You will also need to add a variable to specify the memcached servers you are using. To do this add a variable named `MEMCACHED_SERVERS` to the `.env` file and set the value to be you memcached servers in the following format: `HOST:PORT:WEIGHT, HOST2:PORT:WEIGHT`. You can specify as many servers as you want. Their usage split will be determined by the weight given to them. Here are some examples of what the `.env` file should look like:

```
# Set both the cache and session to use memcached
CACHE_DRIVER=memcached
SESSION_DRIVER=memcached

# Example of using a single local memcached server
MEMCACHED_SERVERS=127.0.0.1:11211:100

# Example of using two non-local memcached servers with an equal split
MEMCACHED_SERVERS=8.8.8.8:11211:50,8.8.4.4:11211:50
```
