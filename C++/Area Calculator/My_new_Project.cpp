#include<iostream>
using namespace std;

void areaofcircle();
void areaofrectangle();
void areaoftrianlge();
void areaofsquare();

int main()
{
    int option,i;
    runagain:
    cout<<"Option-1: Area of Circle"<<endl;
    cout<<"Option-2: Area of Rectangle"<<endl;
    cout<<"Option-3: Area of Triangle"<<endl;
    cout<<"Option-4: Area of Square"<<endl;
    cout<<"Enter your option"<<endl;
    cin>>option;

    if(option==1)
    {
        areaofcircle();
    }
    else if(option==2)
    {
        areaofrectangle();
    }
    else if(option==3)
    {
        areaoftrianlge();
    }
    else if(option==4)
    {
        areaofsquare();
    }
    else
    {
        cout<<"Invalid option";
    }
    cout<<endl;
    cout<<"Do you want to run the program again?"<<endl;
    cout<<"If yes then press 1"<<endl;
    cout<<"If no then press 2"<<endl;
    cin>> i;
    if(i==1)
    {
        goto runagain;
    }
    else if (i==2)
    {
        cout<<"Okay the program won't run again"<<endl;
    }
    else
    {
        cout<<"Invalid option"<<endl;
    }
}

void areaofcircle()
{
    float r,pi=3.1416,Area;
    cout<<"Enter the radius of the circle:"<<endl;
    cin>>r;
    Area=pi*r*r;
    cout<<"Area of the circle is: "<<Area;
}

void areaofrectangle()
{
    float a,b,Area;
    cout<<"Enter the length of the rectangle:"<<endl;
    cin>>a;
    cout<<"Enter the width of the rectangle:"<<endl;
    cin>>b;
    Area=a*b;
    cout<<"Area of the rectangle is: "<<Area;
}

void areaoftrianlge()
{
    float a,b,Area;
    cout<<"Enter the height of the triangle:"<<endl;
    cin>>a;
    cout<<"Enter the marl of the triangle:"<<endl;
    cin>>b;
    Area=0.5*a*b;
    cout<<"Area of the triangle is: "<<Area;
}

void areaofsquare()
{
    float a,Area;
    cout<<"Enter the side length of the square:"<<endl;
    cin>>a;
    Area=a*a;
    cout<<"Area of the square is: "<<Area;
}

