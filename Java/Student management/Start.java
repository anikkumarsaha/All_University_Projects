import java.util.* ; //For taking input and exception handling
import java.lang.* ;
import java.io.*; //File class is included here

public class Start
{
	public static void main(String[] args)
	{
		System.out.println("**************************************************") ;
		System.out.println("**************************************************") ;
		System.out.println("**************************************************") ;
		System.out.println() ;
		System.out.println("*************** STUDENT MANAGEMENT ***************") ;
		System.out.println() ;
		System.out.println("**************************************************") ;
		System.out.println("**************************************************") ;
		System.out.println("**************************************************") ;
		
		System.out.println() ;
		
		System.out.println("Create an admin account and login to access details") ;
		
		admin ad = new admin() ; //Object of admin class
		
		ad.newAccount() ; //Calling method for creating new account from admin class
		
		operations rec = new operations() ; //Object of operations class
		
		fileclass f = new fileclass() ; //Object of fileclass class
		
		Scanner sc = new Scanner(System.in) ; //Scanner for taking input
		
		System.out.println("What do you prefer to do now?" ) ;
		System.out.println("1)Login") ;
		System.out.println("2)Exit") ;
		System.out.println("Please enter the number only") ;
		
		try //try block for finding exception
		{
			int input = sc.nextInt() ; //Taking input
			
			if(input == 2)
			{
				System.out.println("Thank You") ;
			}
			else if(input == 1)
			{
				ad.login() ; //Calling method for loging in from admin class
				rec.task() ; //Calling method for selecting operations from operations class
			}
			else
			{
				System.out.println("This option doesn't exist! Please try over") ;
				System.exit(0) ; //Terminates program fully
			}
		}
		catch(InputMismatchException e) //Catch block to handle the exception
		{
				System.out.println("Invalid Input! Please try over " + e) ;
				//System.out.println(e.getMessage()) ; //Shows a pre defined message for the error
				//e.printStackTrace() ; //Shows where the error occured
				System.exit(0) ; //Terminates program fully
		}
	
		f.writeFile() ; //Calling method to write file
		System.out.println("\n\n--------------------- Printing Student's List ------------------------\n\n") ;
		f.Readf() ; //Calling method to read file
	}
}