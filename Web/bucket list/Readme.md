# Writeup
Description:
I store the flag on the bucket. How to access my secure bucket? 
https://capture-the-flag-bucket.s3.ap-southeast-1.amazonaws.com/flag.txt

There is a secret serverless service called list-bucket-lambda.
https://ywe7ydb0vi.execute-api.us-east-2.amazonaws.com

Solution:
1. Since the S3 bucket is not open for public, we are unable to download the file from S3 bucket. 

https://capture-the-flag-bucket.s3.ap-southeast-1.amazonaws.com/flag.txt

2. There is a lambda function named **list-bucket-labmda** to list bucket.

3. In a GET request, We pass the parameters with correct bucket name and file object.

```
https://<rest-api-id>.execute-api.<region>.amazonaws.com/<stage-name>/<lambda function>
```

https://ywe7ydb0vi.execute-api.us-east-2.amazonaws.com/default/list-bucket-lambda?bucket=capture-the-flag-bucket&key=flag.txt

4. Decode the base-64 response text.

## flag
MOCSCTF{Acce55_S3_fOrm_d@nger0us_Lambda}