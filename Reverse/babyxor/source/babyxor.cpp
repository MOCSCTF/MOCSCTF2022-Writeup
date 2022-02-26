#define _CRT_SECURE_NO_WARNINGS

#include <iostream>

#include<stdio.h>
#include<stdlib.h>
#include<time.h>
#include<string.h>
#define MAX 65534

int S[256]; //向量S
char T[256];    //向量T
int Key[256];   //随机生成的密钥
int KeyStream[MAX]; //密钥
char PlainText[MAX];
char CryptoText[MAX];
const char *WordList = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
int textLength;
inline void init_S()
// 初始化S;
{
    for(int i = 0; i < 256; i++){
        S[i] = i;
    }
}
inline void init_Key(){
    // 初始密钥
    int index;
    srand(25565);  //设置种子
    int keylen = int(double(rand())/double(RAND_MAX)*256);    //随机获取一个密钥的长度
    for(int i = 0; i < keylen; i++){
        index = int(double(rand())/double(RAND_MAX)*63);  //生产密钥数组
        Key[i] = WordList[index];
    }
    int d;
    for (int i = 0; i < 256; i++) {   //初始化T[]
        T[i] = Key[i % keylen];
    }
}
inline void  permute_S()
{
    // 置换S;
    int temp;
    int j = 0;
    for(int i = 0; i < 256; i++){
        j = (j + S[i] + T[i]) % 256;
        temp = S[i];
        S[i] = S[j];
        S[j] = temp;
    }
}
inline void create_key_stream(char *text, int textLength)
{
    // 生成密钥流
    int i,j;
    int temp, t, k;
    int index = 0;
    i = j = 0;
    while(textLength --){   //生成密钥流
        i = (i+1)%240;
        j = (j + S[i]) % 254;
        temp = S[i];
        S[i] = S[j];
        S[j] = temp;
        t = (S[i] + S[j] + 3) % 250;
        KeyStream[index] = S[t];
        index ++;
    }
 
}

 void Rc4EncryptText(char *text)
{
    //加密 && 解密
    init_S();
    init_Key();
    permute_S();
    create_key_stream(text, textLength);
    int plain_word;
    for(int i = 0; i < textLength; i++){
        CryptoText[i] = char(KeyStream[i] ^ text[i]); //加密
   }
}

//MOCSCTF{W31c0me_AnD_welcome!!!_Re_1s_Ez}
int main()
{   
    printf("Welcome to MOCSCTF-2022!!!!!\n");
    printf("Please input your flag:");
    char in[100];
    scanf("%s", in);
    textLength = strlen(in);
    Rc4EncryptText(in);

    int i = 0;
    char enc_flag[] = { 0xDA,0xCC,0xF,0x24,0x3B,0xD2,0xA,0x83,0xED,0xF0,0x5E,0xB6,0xE9,0x6A,0x85,0xEB,0xAE,0x82,0x84,0x48,0x38,0xB9,0x77,0x6F,0xCD,0xB1,0x6,0x83,0xD1,0x9B,0xD4,0x2C,0x6C,0xEC,0x12,0x3B,0x17,0x9C,0x7,0x6C ,0x00};
    
    for (i = 0; i < strlen(enc_flag); i++) {
        if (CryptoText[i] != enc_flag[i])break;
    }
    if (i == strlen(enc_flag) && textLength==strlen(enc_flag))printf("Genius! Your input is the right flag.");
    else printf("Wrong! Please try again.");
    return 0;
}