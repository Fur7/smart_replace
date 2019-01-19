# Smart replace

A really simple way using the PHP str_replace function with some extra functionalities.

## Usage
#### The difference between str_replace and smart_replace:
```sh
$replace = str_replace(["!","Hello"],[".","Good morning"],"Hello world!");
output: Good morning world.

$replace = smart_replace(["!"=>".","Hello"=>"Good morning"],"Hello world!");
output: Good morning world.
```

#### Exclude options from the replace function:
For example; To remove a slash from an URL where the link is not starting with /nl/ or /de/
```sh
string = '<a href="/nl/testlink"></a> <a href="/testlink"></a> <a href="/de/testlink"></a>';
$searchOn = [
    '<a href="/' => '<a href="'
];
$exclude = [
    '<a href="/nl/',
    '<a href="/de/'
];
$replace = smart_replace($searchOn, $string, $exclude);

output: <a href="/nl/testlink"></a> <a href="testlink"></a> <a href="/de/testlink"></a>
```