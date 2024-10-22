<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Aws\S3\S3Client;
use Aws\Exception\AwsException;

class TestAwsConnection extends Command
{
    protected $signature = 'aws:test-connection';
    protected $description = 'Test AWS S3 connection';

    public function handle()
    {
        $this->info('Testing AWS S3 connection...');
    
        try {
            $s3 = new S3Client([
                'version' => 'latest',
                'region'  => config('filesystems.disks.s3.region'),
                'credentials' => [
                    'key'    => config('filesystems.disks.s3.key'),
                    'secret' => config('filesystems.disks.s3.secret'),
                ],
            ]);
    
            $bucket = config('filesystems.disks.s3.bucket');
            $objects = $s3->listObjects([
                'Bucket' => $bucket,
            ]);
    
            $this->info('Connection successful!');
            $this->info("Contents of bucket '{$bucket}':");
            foreach ($objects['Contents'] as $object) {
                $this->line(' - ' . $object['Key']);
            }
        } catch (AwsException $e) {
            $this->error('Connection failed: ' . $e->getMessage());
        }
    }
}