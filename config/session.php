<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Session Driver
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này xác định "driver" session mặc định sẽ được sử dụng trên
    | các request. Mặc định, Laravel sử dụng driver "file" nhẹ, nhưng bạn
    | có thể chỉ định bất kỳ driver tuyệt vời nào khác được cung cấp ở đây.
    |
    | Hỗ trợ: "file", "cookie", "database", "apc",
    |          "memcached", "redis", "dynamodb", "array"
    |
    */

    'driver' => env('SESSION_DRIVER', 'file'),

    /*
    |--------------------------------------------------------------------------
    | Session Lifetime
    |--------------------------------------------------------------------------
    |
    | Tại đây, bạn có thể xác định số phút mà bạn muốn session
    | được phép duy trì trước khi hết hạn. Nếu bạn muốn chúng
    | hết hạn ngay khi đóng trình duyệt, hãy đặt tùy chọn này.
    |
    */

    'lifetime' => env('SESSION_LIFETIME', 120),

    'expire_on_close' => false,

    /*
    |--------------------------------------------------------------------------
    | Session Encryption
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này cho phép bạn dễ dàng xác định rằng tất cả dữ liệu session
    | nên được mã hóa trước khi lưu trữ. Tất cả việc mã hóa sẽ được Laravel
    | thực hiện tự động và bạn có thể sử dụng Session như bình thường.
    |
    */

    'encrypt' => false,

    /*
    |--------------------------------------------------------------------------
    | Session File Location
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng driver session "file", chúng ta cần một vị trí nơi các file
    | session có thể được lưu trữ. Mặc định đã được thiết lập cho bạn, nhưng
    | bạn có thể chỉ định một vị trí khác nếu cần. Chỉ cần cho các session file.
    |
    */

    'files' => storage_path('framework/sessions'),

    /*
    |--------------------------------------------------------------------------
    | Session Database Connection
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng driver session "database" hoặc "redis", bạn có thể chỉ định
    | kết nối nào nên được sử dụng để quản lý các session này. Điều này nên
    | tương ứng với một kết nối trong các tùy chọn cấu hình database của bạn.
    |
    */

    'connection' => env('SESSION_CONNECTION', null),

    /*
    |--------------------------------------------------------------------------
    | Session Database Table
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng driver session "database", bạn có thể chỉ định bảng nào
    | chúng ta nên sử dụng để quản lý các session. Tất nhiên, một mặc định
    | hợp lý đã được cung cấp cho bạn; tuy nhiên, bạn có thể thay đổi nếu cần.
    |
    */

    'table' => 'sessions',

    /*
    |--------------------------------------------------------------------------
    | Session Cache Store
    |--------------------------------------------------------------------------
    |
    | Khi sử dụng một trong các backend session được hỗ trợ bởi cache của framework,
    | bạn có thể liệt kê một cache store nên được sử dụng cho các session này.
    | Giá trị này phải khớp với một trong các "stores" cache được cấu hình của ứng dụng.
    |
    | Ảnh hưởng: "apc", "dynamodb", "memcached", "redis"
    |
    */

    'store' => env('SESSION_STORE', null),

    /*
    |--------------------------------------------------------------------------
    | Session Sweeping Lottery
    |--------------------------------------------------------------------------
    |
    | Một số driver session phải quét thủ công vị trí lưu trữ của chúng để loại bỏ
    | các session cũ khỏi lưu trữ. Dưới đây là tỷ lệ mà việc quét sẽ xảy ra
    | trên một request nhất định. Mặc định, tỷ lệ là 2 trên 100.
    |
    */

    'lottery' => [2, 100],

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Name
    |--------------------------------------------------------------------------
    |
    | Tại đây, bạn có thể thay đổi tên của cookie được sử dụng để xác định
    | một session instance theo ID. Tên được chỉ định ở đây sẽ được sử dụng
    | mỗi khi một cookie session mới được tạo bởi framework cho mỗi driver.
    |
    */

    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_').'_session'
    ),

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Path
    |--------------------------------------------------------------------------
    |
    | Đường dẫn cookie session xác định đường dẫn mà cookie sẽ
    | được coi là khả dụng. Thông thường, đây sẽ là đường dẫn gốc của
    | ứng dụng của bạn, nhưng bạn có thể thay đổi khi cần thiết.
    |
    */

    'path' => '/',

    /*
    |--------------------------------------------------------------------------
    | Session Cookie Domain
    |--------------------------------------------------------------------------
    |
    | Tại đây, bạn có thể thay đổi domain của cookie được sử dụng để xác định
    | một session trong ứng dụng của bạn. Điều này sẽ xác định domain nào
    | cookie sẽ khả dụng trong ứng dụng của bạn. Một mặc định hợp lý đã được thiết lập.
    |
    */

    'domain' => env('SESSION_DOMAIN', null),

    /*
    |--------------------------------------------------------------------------
    | HTTPS Only Cookies
    |--------------------------------------------------------------------------
    |
    | Bằng cách đặt tùy chọn này thành true, cookie session sẽ chỉ được gửi lại
    | đến server nếu trình duyệt có kết nối HTTPS. Điều này sẽ giữ cho
    | cookie không được gửi đến bạn khi không thể thực hiện một cách an toàn.
    |
    */

    'secure' => env('SESSION_SECURE_COOKIE', false),

    /*
    |--------------------------------------------------------------------------
    | HTTP Access Only
    |--------------------------------------------------------------------------
    |
    | Đặt giá trị này thành true sẽ ngăn JavaScript truy cập vào
    | giá trị của cookie và cookie sẽ chỉ có thể truy cập thông qua
    | giao thức HTTP. Bạn có thể thay đổi tùy chọn này nếu cần.
    |
    */

    'http_only' => true,

    /*
    |--------------------------------------------------------------------------
    | Same-Site Cookies
    |--------------------------------------------------------------------------
    |
    | Tùy chọn này xác định cách cookie của bạn hoạt động khi các request
    | cross-site diễn ra, và có thể được sử dụng để giảm thiểu các cuộc tấn công CSRF.
    | Mặc định, chúng tôi sẽ đặt giá trị này thành "lax" vì đây là giá trị mặc định an toàn.
    |
    | Hỗ trợ: "lax", "strict", "none", null
    |
    */

    'same_site' => 'lax',

];
