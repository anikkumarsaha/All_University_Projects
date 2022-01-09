import java.lang.* ; 
import java.util.* ; //For taking input and exception handling

import InterFace.adminInterface ;

public class admin implements adminInterface //Implementing interface class
{
	//Public instance variables
	public String UserName ;
	public String Password ;
	
	//Public method for account creation
	public void newAccount()
	{
		Scanner a = new Scanner(System.in) ; //Scanner for taking input
		
		System.out.println() ;
		System.out.println() ;
		System.out.println("Give a Username") ;
		this.UserName = a.nextLine() ; //Taking username as input
		
		System.out.println("Give a Password") ;
		this.Password = a.nextLine() ; //Taking password as input
		System.out.println() ;
		System.out.println() ;
		
		System.out.println("Account creation successful") ;
		System.out.println() ;
		
		System.out.println("You can now login to your account") ;
		System.out.println() ;
	}
	
	//Public method for loging in
	public void login()
	{
		Scanner a = new Scanner(System.in) ; //Scanner for taking input
		
		System.out.println() ;
		System.out.println() ;
		System.out.println("Enter Username") ;
		String User = a.nextLine() ; //Local variable for storing the input // Taking input
		
		System.out.println("Enter Password") ;
		String Pass = a.nextLine() ; //Local variable for storing the input //Taking input
		
		//Matching the Login inputs with newAccount inputs
		if(User.equals(UserName) == false || Pass.equals(Password) == false)
		{
			do
			{
				System.out.println() ;
				System.out.println("Informations didn't match") ;
			    System.out.println("Please try again") ;
				
				System.out.println() ;
				System.out.println() ;
				System.out.println("Enter Username") ;
				User = a.nextLine() ; //Local variable for storing the input
				
				System.out.println("Enter Password") ;
				Pass = a.nextLine() ; //Local variable for storing the input
				
				if(User.equals(UserName) == true && Pass.equals(Password) == true)
				{
					System.out.println() ;
					System.out.println("You are now logged in") ;
					System.out.println() ;
					break ;
				}
			}
			while(User.equals(UserName) == false || Pass.equals(Password) == false) ;
		}
		else
		{
			System.out.println() ;
			System.out.println("You are now logged in") ;
			System.out.println() ;
		}
	}
}