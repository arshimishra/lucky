#include<stdio.h>
#include<conio.h>

int k=0;
int l=0;
int result=0;
int menu()
{
int ch;
 printf("\n 1. add");
 printf("\n 2. sub");
 printf("\n 3. mul");
 printf("\n 4. div");
 printf("\n 5. rem");
 printf("\n 6. clear");
 printf("\n 7. exit");
 printf("\n enter your choice : ");
 scanf("%d",&ch);
 return(ch);
}

void add()
{
int a,b;
  if(k)
  {
    printf("enter a number : ");
    scanf("%d",&a);
    result+=a;
    printf("\n result = %d ", result);
  }
  else
  {
   printf("enter two numbers : ");
   scanf("%d %d",&a ,&b);
   result=a+b;
   printf("\n result = %d ", result);
  }
}
void sub()
{
int a,b;
  if(k)
  {
    printf("enter a number : ");
    scanf("%d",&a);
    result-=a;
     printf("\n result = %d ", result);
  }
  else
  {
   printf("enter two numbers : ");
   scanf("%d %d",&a ,&b);
   result=a-b;
    printf("\n result = %d ", result);
  }
}
void mul()
{
int a,b;
  if(k)
  {
    printf("enter a number : ");
    scanf("%d",&a);
    result*=a;
     printf("\n result = %d ", result);
  }
  else
  {
   printf("enter two numbers : ");
   scanf("%d %d",&a ,&b);
   result=a*b;
    printf("\n result = %d ", result);
  }
}
void div()
{
int a,b;
  if(k)
  {
    printf("enter a number : ");
    scanf("%d",&a);
    result/=a;
    printf("\n result = %d ", result);
  }
  else
  {
   printf("enter two numbers : ");
   scanf("%d %d",&a ,&b);
   result=a/b;
    printf("\n result = %d ", result);
  }
}
void rem()
{
int a,b;
  if(k)
  {
    printf("enter a number : ");
    scanf("%d",&a);
    result%=a;
    printf("\n result = %d ", result);
  }
  else
  {
   printf("enter two numbers : ");
   scanf("%d %d",&a ,&b);
   result=a%b;
    printf("\n result = %d ", result);
  }
}

void clear()
{
 printf("all data cleared .");
 result=0;
 k=0;
}

void main()
{
while(1)
{
clrscr();
printf("  old answer = %d" ,result);
 switch(menu())
 {
    case 1:
    {
     add();
     k=1;
     break;
    }
    case 2:
    {
    sub();
    k=1;
    break;
    }
    case 3:
    {
    mul();
    k=1;
    break;
    }
    case 4:
    {
    div();
    k=1;
    break;
    }
    case 5:
    {
     rem();
     k=1;
     break;
    }
    case 6:
    {
     clear();
     break;
    }
    case 7:
    {
     l=1;
     break;
    }
    default:
    {
     printf("invalid choice");
    }
 }//end of switch
 if(l)
 {
  break;
 }
 getch();
}// end of while

}