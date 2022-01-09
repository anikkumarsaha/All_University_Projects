#include<bits/stdc++.h>
using namespace std;

typedef long long ll;
typedef vector<int> vi;
typedef pair<int,int> pi;

#define ins insert
#define sz size()
#define unordered_set uns
#define ff first
#define ss second
#define pb push_back
#define mp make_pair
#define endl "\n"
#define optimize() ios_base::sync_with_stdio(false);cin.tie(0);cout.tie(0);


int main()
{
    //optimize();

    cout<<"Input Exp: ";
    string s;
    getline(cin,s);
    if(s.size()<4)
    {
        for(int i=0;i<s.size();i++)
        {
            if(s[i]=='+' or s[i]=='*')
            {
                if(s[i+1]=='+' or s[i+1]=='*')
                {
                    cout<<"Invalid Expression"<<endl;
                    return 0;
                }
            }
        }
        if(s[1]=='U')
        {
            cout<<"Input String: ";
            char a;
            cin >> a;
            if(a==s[0] or a==s[2])
            {
                cout<<"Valid"<<endl;
            }
            else
            {
                cout<<"Invalid"<<endl;
            }
        }
        else if(s[1]=='*')
        {
            cout<<"Input String: ";
            string input;
            getline(cin,input);
            sort(input.begin(),input.end());
            int n=unique(input.begin(),input.end())-input.begin();

            if(n==1 and input[0] == s[0] or n==0)
            {
                cout<<"Valid"<<endl;
            }
            else
            {
                cout<<"Invalid"<<endl;
            }

        }
        else if(s[1]=='+')
        {
            cout<<"Input String: ";
            string input;
            getline(cin,input);
            sort(input.begin(),input.end());
            int n=unique(input.begin(),input.end())-input.begin();

            if(n==1 and input[0] == s[0])
            {
                cout<<"Valid"<<endl;
            }
            else
            {
                cout<<"Invalid"<<endl;
            }
        }
    }
    else
    {
        cout<<"Invalid Expression"<<endl;
    }



}
