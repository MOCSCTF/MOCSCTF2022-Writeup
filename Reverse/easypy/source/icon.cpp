// icon.cpp : 此文件包含 "main" 函数。程序执行将在此处开始并结束。
//

#include <iostream>
#include <math.h>
using namespace std;
#define rand255 (rand()%255)

char enc[] = {107,10,10,221,250,23,139,224,138,85,194,122,74,116,214,94,103,75,147,254,45,127,132,248,62,117,24,181};

int main()
{
    srand(0);
    char in_txt[80];
    cin >> in_txt;
    char *ptr = in_txt;
    while (*ptr != 0) {
        if ((rand255^*ptr) != enc[ptr-in_txt])break;
        ptr++;
    }
    if(ptr-in_txt!=28&&strlen(in_txt)!=28)cout << "haha";
    else cout << "Your input is correct.";
}