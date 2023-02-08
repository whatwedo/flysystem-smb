<?php


use Icewind\SMB\BasicAuth;
use Icewind\SMB\ServerFactory;
use League\Flysystem\Filesystem;
use whatwedo\FlysystemSmb\SmbAdapter;

class AdapterTest extends \PHPUnit\Framework\TestCase
{

    public function testReadWrite()
    {
        $filesystem = $this->getFilesystem();
        $filesystem->write('new_file.txt', 'yay a new text file!');

        self::assertSame(true, $filesystem->has('new_file.txt'));
        self::assertSame('yay a new text file!', $filesystem->read('new_file.txt'));
    }

    public function getFilesystem(): Filesystem
    {
        $serverFactory = new ServerFactory();
        $auth = new BasicAuth('dde', 'workgroup', 'mypassword');
        $server = $serverFactory->createServer('localhost', $auth);

        $share = $server->getShare('dde');

        $filesystem = new Filesystem(new SmbAdapter($share));

        return $filesystem;
    }
}