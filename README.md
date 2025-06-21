# Biboletin Enum Library

A PHP library providing a collection of enum classes for various purposes including cryptographic operations, versioning, and caching.

## Installation

You can install the package via composer:

```bash
composer require biboletin/enum
```

## Requirements

- PHP 8.1 or higher (PHP enums are required)

## Available Enums

### HashAlgorithm

An enum representing different hash algorithms for cryptographic operations.

#### Available Cases:
- `SHA256`: SHA-256 hash algorithm (256-bit)
- `SHA384`: SHA-384 hash algorithm (384-bit)
- `SHA512`: SHA-512 hash algorithm (512-bit)

#### Methods:
- `length()`: Returns the length of the hash output in bytes
- `digest(string $data, bool $binary = true)`: Generates a hash digest of the provided data
- `hmac(string $data, string $key, bool $binary = true)`: Generates an HMAC using the specified key
- `fromString(string $value)`: Creates a HashAlgorithm instance from a string value

#### Example Usage:
```php
use Biboletin\Enum\HashAlgorithm;

// Get hash length
$length = HashAlgorithm::SHA256->length(); // Returns 32

// Generate a hash digest
$digest = HashAlgorithm::SHA256->digest('Hello, World!');

// Generate an HMAC
$hmac = HashAlgorithm::SHA256->hmac('Hello, World!', 'secret_key');

// Create from string
$algorithm = HashAlgorithm::fromString('sha256'); // Returns HashAlgorithm::SHA256
```

### CipherAlgorithm

An enum defining various cipher algorithms used for encryption.

#### Available Cases:
- AES in CBC mode: `AES_128_CBC`, `AES_192_CBC`, `AES_256_CBC`
- AES in GCM mode: `AES_128_GCM`, `AES_192_GCM`, `AES_256_GCM`
- ChaCha20-Poly1305: `CHACHA20_POLY1305`
- SM4 in various modes: `SM4_GCM`, `SM4_CCM`, `SM4_CTR`, `SM4_CBC`

#### Example Usage:
```php
use Biboletin\Enum\CipherAlgorithm;

// Use a specific cipher algorithm
$cipher = CipherAlgorithm::AES_256_GCM;

// Get the string value
$cipherValue = $cipher->value; // Returns 'aes-256-gcm'
```

### CacheDriver

An enum representing different cache drivers that can be used in an application.

#### Available Cases:
- `APCU`: APC User Cache
- `FILE`: File-based caching
- `MEMORY`: In-memory caching
- `REDIS`: Redis caching
- `MEMCACHED`: Memcached caching
- `DATABASE`: Database caching

#### Methods:
- `fromString(string $value)`: Creates a CacheDriver instance from a string value
- `isValid(string $value)`: Checks if a string value is a valid cache driver
- `all()`: Returns an array of all cache driver enum instances
- `toArray()`: Converts the enum instance to an associative array
- `getLowercaseName()`: Returns the name in lowercase
- `getUppercaseName()`: Returns the name in uppercase
- `getName()`: Returns the name
- `getValue()`: Returns the value
- `getLowercaseValue()`: Returns the value in lowercase
- `getUppercaseValue()`: Returns the value in uppercase
- `getTitleCaseValue()`: Returns the value in title case

#### Example Usage:
```php
use Biboletin\Enum\CacheDriver;

// Create from string
$driver = CacheDriver::fromString('redis'); // Returns CacheDriver::REDIS

// Check if a value is valid
$isValid = CacheDriver::isValid('redis'); // Returns true

// Get all cache drivers
$allDrivers = CacheDriver::all();

// Convert to array
$driverArray = CacheDriver::REDIS->toArray(); // Returns ['name' => 'REDIS', 'value' => 'redis']

// Get formatted names/values
$name = CacheDriver::REDIS->getName(); // Returns 'REDIS'
$value = CacheDriver::REDIS->getValue(); // Returns 'redis'
$upperValue = CacheDriver::REDIS->getUppercaseValue(); // Returns 'REDIS'
$titleValue = CacheDriver::REDIS->getTitleCaseValue(); // Returns 'Redis'
```

### AppVersion

An enum defining the version of the application.

#### Available Cases:
- `V1_0_0`: Version 1.0.0 of the application

#### Methods:
- `withPrefix(string $prefix)`: Returns the version value with a specified prefix

#### Example Usage:
```php
use Biboletin\Enum\AppVersion;

// Get the version
$version = AppVersion::V1_0_0; // Returns AppVersion::V1_0_0

// Get the version with a prefix
$versionWithPrefix = AppVersion::V1_0_0->withPrefix('v'); // Returns 'v1.0.0'
```

### ApiVersion

An enum defining the API version used in the application.

#### Available Constants:
- `V1`: Version 1 of the API

#### Example Usage:
```php
use Biboletin\Enum\ApiVersion;

// Get the API version
$apiVersion = ApiVersion::V1; // Returns 'v1'
```

### CryptoVersion

An enum defining the version of the cryptographic protocol used.

#### Available Cases:
- `V1`: Version 1 of the cryptographic protocol

#### Example Usage:
```php
use Biboletin\Enum\CryptoVersion;

// Get the crypto version
$cryptoVersion = CryptoVersion::V1; // Returns CryptoVersion::V1

// Get the string value
$versionValue = CryptoVersion::V1->value; // Returns 'v1'
```

### DatabaseDriver

An enum representing different database drivers that can be used in an application.

#### Available Cases:
- `MYSQL`: MySQL database driver
- `POSTGRESQL`: PostgreSQL database driver
- `SQLITE`: SQLite database driver
- `MONGODB`: MongoDB database driver
- `SQLSERVER`: SQL Server database driver
- `ORACLE`: Oracle database driver
- `REDIS`: Redis database driver
- `CASSANDRA`: Cassandra database driver
- `DYNAMODB`: DynamoDB database driver
- `COUCHBASE`: Couchbase database driver
- `ELASTICSEARCH`: Elasticsearch database driver
- `CLICKHOUSE`: ClickHouse database driver
- `MARIADB`: MariaDB database driver
- `COCKROACHDB`: CockroachDB database driver
- `FIREBIRD`: Firebird database driver

#### Methods:
- `fromString(string $value)`: Creates a DatabaseDriver instance from a string value
- `isValid(string $value)`: Checks if a string value is a valid database driver
- `getAllDrivers()`: Returns an array of all database driver enum instances
- `getLowercaseName()`: Returns the name in lowercase
- `getUppercaseName()`: Returns the name in uppercase
- `getTitleCaseName()`: Returns the name in title case
- `getSnakeCaseName()`: Returns the name in snake case
- `getKebabCaseName()`: Returns the name in kebab case

#### Example Usage:
```php
use Biboletin\Enum\DatabaseDriver;

// Create from string
$driver = DatabaseDriver::fromString('mysql'); // Returns DatabaseDriver::MYSQL

// Check if a value is valid
$isValid = DatabaseDriver::isValid('mysql'); // Returns true

// Get all database drivers
$allDrivers = DatabaseDriver::getAllDrivers();

// Get formatted names
$lowercaseName = DatabaseDriver::MYSQL->getLowercaseName(); // Returns 'mysql'
$uppercaseName = DatabaseDriver::MYSQL->getUppercaseName(); // Returns 'MYSQL'
$titleCaseName = DatabaseDriver::MYSQL->getTitleCaseName(); // Returns 'Mysql'
$snakeCaseName = DatabaseDriver::MYSQL->getSnakeCaseName(); // Returns 'mysql'
$kebabCaseName = DatabaseDriver::MYSQL->getKebabCaseName(); // Returns 'mysql'
```

### HttpStatus

An enum representing HTTP status codes as defined by IETF RFCs.

#### Available Cases:
- Informational responses (100–199)
- Successful responses (200–299)
- Redirection messages (300–399)
- Client error responses (400–499)
- Server error responses (500–599)

#### Methods:
- `message()`: Returns the message associated with the status code
- `category()`: Returns the category of the status code
- `resolve(int $code)`: Resolves a status code to its corresponding enum case
- `isClientError()`: Checks if the status code is a client error
- `isServerError()`: Checks if the status code is a server error
- `isSuccess()`: Checks if the status code is a success
- `isRedirection()`: Checks if the status code is a redirection
- `isInformational()`: Checks if the status code is informational
- `toArray()`: Converts the enum instance to an array

#### Example Usage:
```php
use Biboletin\Enum\HttpStatus;

// Get a status code
$status = HttpStatus::OK; // 200 OK

// Get the message
$message = HttpStatus::NOT_FOUND->message(); // Returns 'Not Found'

// Check the category
$isClientError = HttpStatus::NOT_FOUND->isClientError(); // Returns true

// Resolve from code
$status = HttpStatus::resolve(404); // Returns HttpStatus::NOT_FOUND
```

### StatusCodeCategory

An enum representing categories of HTTP status codes.

#### Available Cases:
- `INFORMATIONAL`: Informational responses (100–199)
- `SUCCESS`: Successful responses (200–299)
- `REDIRECTION`: Redirection messages (300–399)
- `CLIENT_ERROR`: Client error responses (400–499)
- `SERVER_ERROR`: Server error responses (500–599)

#### Methods:
- `fromString(string $value)`: Creates a StatusCodeCategory instance from a string value
- `isValid(string $value)`: Checks if a string value is a valid status code category
- `getReadableName()`: Returns the category name in a human-readable format
- `all()`: Returns an array of all status code categories
- `toArray()`: Converts the enum instance to an array
- `getLowercaseName()`: Returns the name in lowercase
- `getUppercaseName()`: Returns the name in uppercase
- `getTitleCaseName()`: Returns the name in title case

#### Example Usage:
```php
use Biboletin\Enum\StatusCodeCategory;

// Create from string
$category = StatusCodeCategory::fromString('client error'); // Returns StatusCodeCategory::CLIENT_ERROR

// Check if a value is valid
$isValid = StatusCodeCategory::isValid('client error'); // Returns true

// Get a readable name
$readableName = StatusCodeCategory::CLIENT_ERROR->getReadableName(); // Returns 'Client Error'

// Get all categories
$allCategories = StatusCodeCategory::all();
```

### RedirectType

An enum representing different types of HTTP redirects.

#### Available Cases:
- `TEMPORARY`: Temporary redirect (302)
- `PERMANENT`: Permanent redirect (301)
- `SEE_OTHER`: See other (303)
- `NOT_MODIFIED`: Not modified (304)
- `USE_PROXY`: Use proxy (305)
- `SWITCH_PROXY`: Switch proxy (306)
- `TEMPORARY_REDIRECT`: Temporary redirect (307)
- `PERMANENT_REDIRECT`: Permanent redirect (308)
- `MULTIPLE_CHOICES`: Multiple choices (300)

#### Methods:
- `fromInt(int $value)`: Creates a RedirectType instance from an integer value
- `isValid(int $value)`: Checks if an integer value is a valid redirect type
- `toInt()`: Returns the redirect type as an integer
- `toString()`: Returns the redirect type as a string
- `all()`: Returns an array of all redirect types
- `toArray()`: Converts the enum instance to an array

#### Example Usage:
```php
use Biboletin\Enum\RedirectType;

// Create from integer
$redirectType = RedirectType::fromInt(301); // Returns RedirectType::PERMANENT

// Check if a value is valid
$isValid = RedirectType::isValid(301); // Returns true

// Convert to integer
$code = RedirectType::PERMANENT->toInt(); // Returns 301

// Convert to string
$description = RedirectType::PERMANENT->toString(); // Returns 'Permanent Redirect'
```

### HttpMethod

An enum representing HTTP methods used in web requests.

#### Available Cases:
- `GET`: Retrieve data
- `POST`: Submit data
- `PUT`: Update data
- `DELETE`: Delete data
- `HEAD`: Same as GET but without the response body
- `OPTIONS`: Describe the communication options
- `PATCH`: Partially update data
- `TRACE`: Perform a message loop-back test
- `CONNECT`: Establish a tunnel to the server

#### Methods:
- `isSafe()`: Checks if the method is safe (doesn't alter the server state)
- `isIdempotent()`: Checks if the method is idempotent (can be called multiple times with the same effect)
- `isCacheable()`: Checks if the method is cacheable
- `isWriteOperation()`: Checks if the method is a write operation
- `isReadOperation()`: Checks if the method is a read operation
- `fromString(string $method)`: Creates an HttpMethod instance from a string value
- `all()`: Returns an array of all HTTP methods
- `isValidMethod(string $method)`: Checks if a string value is a valid HTTP method
- Various methods to get the HTTP method from server request in different formats

#### Example Usage:
```php
use Biboletin\Enum\HttpMethod;

// Create from string
$method = HttpMethod::fromString('GET'); // Returns HttpMethod::GET

// Check properties
$isSafe = HttpMethod::GET->isSafe(); // Returns true
$isIdempotent = HttpMethod::GET->isIdempotent(); // Returns true
$isCacheable = HttpMethod::GET->isCacheable(); // Returns true
$isWriteOperation = HttpMethod::POST->isWriteOperation(); // Returns true
$isReadOperation = HttpMethod::GET->isReadOperation(); // Returns true

// Get all methods
$allMethods = HttpMethod::all();
```

### ContentType

An enum representing MIME content types used in HTTP requests and responses.

#### Available Cases:
- `JSON`: application/json
- `XML`: application/xml
- `HTML`: text/html
- `FORM_URLENCODED`: application/x-www-form-urlencoded
- `TEXT`: text/plain
- `MULTIPART_FORM_DATA`: multipart/form-data
- `OCTET_STREAM`: application/octet-stream
- And many others

#### Methods:
- `isJson()`, `isXml()`, `isHtml()`, etc.: Check if the content type is of a specific type
- `toString()`: Returns the content type as a string
- `fromString(string $value)`: Creates a ContentType instance from a string value
- `all()`: Returns an array of all content types
- `isValid(string $value)`: Checks if a string value is a valid content type
- `fromHeader(string $header)`: Creates a ContentType instance from an HTTP header
- `fromFileExtension(string $extension)`: Creates a ContentType instance from a file extension
- Various methods to determine content type from file paths, names, etc.

#### Example Usage:
```php
use Biboletin\Enum\ContentType;

// Create from string
$contentType = ContentType::fromString('application/json'); // Returns ContentType::JSON

// Check type
$isJson = ContentType::JSON->isJson(); // Returns true

// Convert to string
$string = ContentType::JSON->toString(); // Returns 'application/json'

// Create from file extension
$contentType = ContentType::fromFileExtension('json'); // Returns ContentType::JSON
```

### Environment

An enum representing different application environments.

#### Available Cases:
- `DEVELOPMENT`: Development environment
- `PRODUCTION`: Production environment
- `TESTING`: Testing environment
- `STAGING`: Staging environment

#### Methods:
- `isDevelopment()`: Checks if the environment is development
- `isProduction()`: Checks if the environment is production
- `isTesting()`: Checks if the environment is testing
- `isStaging()`: Checks if the environment is staging
- `fromString(string $value)`: Creates an Environment instance from a string value
- `all()`: Returns an array of all environments
- `isValid(string $value)`: Checks if a string value is a valid environment

#### Example Usage:
```php
use Biboletin\Enum\Environment;

// Create from string
$env = Environment::fromString('development'); // Returns Environment::DEVELOPMENT

// Check environment
$isDev = Environment::DEVELOPMENT->isDevelopment(); // Returns true
$isProd = Environment::PRODUCTION->isProduction(); // Returns true

// Get all environments
$allEnvs = Environment::all();

// Check if a value is valid
$isValid = Environment::isValid('development'); // Returns true
```

### LogLevel

An enum representing different log levels for application logging.

#### Available Cases:
- `Emergency`: System is unusable
- `Alert`: Action must be taken immediately
- `Critical`: Critical conditions
- `Error`: Error conditions
- `Warning`: Warning conditions
- `Notice`: Normal but significant condition
- `Info`: Informational messages
- `Debug`: Debug-level messages
- `None`: No logging

#### Methods:
- `isEmergency()`, `isAlert()`, `isCritical()`, etc.: Check if the log level is of a specific type
- `toString()`: Returns the log level as a string
- `fromString(string $value)`: Creates a LogLevel instance from a string value
- `all()`: Returns an array of all log levels
- `isValid(string $value)`: Checks if a string value is a valid log level

#### Example Usage:
```php
use Biboletin\Enum\LogLevel;

// Create from string
$logLevel = LogLevel::fromString('error'); // Returns LogLevel::Error

// Check level
$isError = LogLevel::Error->isError(); // Returns true

// Convert to string
$string = LogLevel::Error->toString(); // Returns 'error'

// Get all log levels
$allLevels = LogLevel::all();

// Check if a value is valid
$isValid = LogLevel::isValid('error'); // Returns true
```

## License

The MIT License (MIT). Please see the [License File](LICENSE) for more information.
