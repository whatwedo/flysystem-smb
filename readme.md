# Flysystem SMB Adapter

This Flysystem adapter uses https://github.com/icewind1991/SMB 

## Installation

```bash
composer require whatwedo/flysystem-smb
```

## Usage

```php
use League\Flysystem\Filesystem;
use League\Flysystem\Memory\MemoryAdapter;


$serverFactory = new \Icewind\SMB\ServerFactory();
$auth = new \Icewind\SMB\BasicAuth('medsuite', 'workgroup', 'medsuite');
$server = $serverFactory->createServer('localhost', $auth);

$share = $server->getShare('Medsuite Share');
        
$filesystem = new Filesystem(new SmbAdapter($share));

$filesystem->write('new_file.txt', 'yay a new text file!');

$contents = $filesystem->read('new_file.txt');

// Explicitly set timestamp (e.g. for testing)
$filesystem->write('old_file.txt', 'very old content', ['timestamp' => 13377331]);
```


## Known Issues

- Visibility is set by using  `\Icewind\SMB\Wrapped\FileInfo::MODE_HIDDEN`
- function `mimeType(string $path)` can be buggy


## License

This bundle is under the MIT license. See the complete license in the bundle: [LICENSE](LICENSE)