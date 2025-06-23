<?php

namespace Biboletin\Enum;

/**
 * Enum representing different buffer sizes for HTTP responses.
 *
 * This enum defines various buffer sizes that can be used when sending
 * HTTP responses. The sizes are defined in bytes and can be used to
 * optimize performance based on the expected response size.
 */
enum ResponseBufferSize: int
{
    /**
     * Default buffer size of 8KB.
     * This is the standard buffer size used for most responses.
     * It is suitable for typical web applications and provides a good balance
     * between performance and memory usage.
     * This size is often used for general-purpose responses
     * and is the default value for many web servers.
     * It is a common choice for web applications that do not require
     * large data transfers.
     */
    case DEFAULT = 8192;

    /**
     * Smaller buffer size of 4KB.
     * This can be used for smaller responses to reduce memory usage.
     * It is particularly useful for applications that handle
     * small data transfers or when memory efficiency is a priority.
     * This size is often used in scenarios where the response data
     * is relatively small, such as in APIs or lightweight web applications.
     * It helps to minimize memory overhead while still allowing
     * efficient data transfer.
     */
    case SMALL = 4096;

    /**
     * Medium buffer size of 16KB.
     * This is suitable for moderate-sized responses.
     * It provides a balance between performance and memory usage
     * for applications that handle larger data transfers.
     * This size is often used in scenarios where the response data
     * is larger than typical web pages but not excessively large.
     * It is a good choice for applications that require
     * efficient data transfer without excessive memory consumption.
     * It is commonly used in web applications that need to handle
     * moderate amounts of data, such as JSON APIs or file downloads.
     */
    case LARGE = 16384; 

    /**
     * Extra large buffer size of 32KB.
     * This is used for very large responses, such as file downloads or large data sets.
     * It is suitable for applications that need to handle substantial data transfers
     * without excessive memory overhead.
     * This size is often used in scenarios where the response data
     * is significantly larger than typical web pages or APIs.
     * It helps to ensure efficient data transfer while minimizing memory usage.
     */
    case EXTRA_LARGE = 32768;

    /**
     * Custom buffer size of 64KB.
     * This can be used for specialized applications that require
     * larger buffer sizes for optimal performance.
     * It is suitable for applications that handle very large data transfers
     * or require high throughput.
     * This size is often used in scenarios where the response data
     * is exceptionally large, such as in media streaming or large file transfers.
     * It helps to ensure efficient data transfer while minimizing memory overhead.
     */
    case CUSTOM = 65536;

    /**
     * Returns the buffer size in bytes.
     *
     * This method returns the value of the enum case as an integer,
     * representing the buffer size in bytes.
     *
     * @return int The buffer size in bytes.
     */
    public function toBytes(): int
    {
        return $this->value;
    }

    /**
     * Returns the buffer size as a string.
     *
     * This method returns the value of the enum case as a string,
     * which can be useful for logging or debugging purposes.
     *
     * @return string The buffer size as a string.
     */
    public function toString(): string
    {
        return (string) $this->value;
    }
    
}
