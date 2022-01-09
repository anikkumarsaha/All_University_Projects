import java.util.* ; //For taking input and exception handling
import java.lang.*;
import java.io.* ; //File class is included here

public class fileclass extends AllRecord //Must inherite from where it will write
{
	/* fileclass() //Default constructor of file class
	{
		
	} */
	
	//Method to write file
	public static void writeFile() //Must be public static void 
	{
		try //try block for finding exception
		{
			File list = new File("StudentsList.txt") ; //Creating text file for reading
			FileWriter w = new FileWriter(list) ; //Creating object
			
			//Giving the head line by built in methods
			w.write("NAME                ") ;
			w.write("ID                  ") ;
			w.write("Department          ") ;
			w.write("CGPA                \n") ;
			
			System.out.println() ;
			
			//Loop for file writing
			for(int i=0 ; i<=50 ; i++)
			{
				if(info[i] != null)
				{
					w.write(info[i].getName()) ;
					for( int j=0 ; j<20-info[i].getName().length() ; j++)
					{
						w.write(" ") ;
					}
					w.write(info[i].getId()) ;
					for( int j=0 ; j<20-info[i].getId().length() ; j++)
					{
						w.write(" ") ;
					}
					w.write(info[i].getDepartment()) ;
					for( int j=0 ; j<20-info[i].getDepartment().length() ; j++)
					{
						w.write(" ") ;
					}
					w.write(info[i].getCgpa()) ;
					for( int j=0 ; j<20-info[i].getCgpa().length() ; j++)
					{
						w.write(" ") ;
					}
					w.write("\n") ;
				}
				if(info[i] == null) //Break if there is no student left to write
				{
					break ;
				}
			}
			w.close() ; //Closing file after finishing writing
		}
		catch (IOException e) //Catch block to handle the exception
		{
			System.out.println("Error " + e) ;
		}
		catch (NullPointerException e) //Catch block to handle the exception
		{
			System.out.println("Error " + e) ;
		}
	}
	
	//Method to read from file
	public static void Readf() //Must be public static void
	{
		try //try block to find exception
		{
			//Scanner class object
			//Passing the full text file as parameter in the scanner class constructor
			//FileReader is needed to read from file 
			Scanner out = new Scanner(new FileReader("StudentsList.txt")) ;
			
			//Loop to read every line
			//hasNextLine reads every line from text file
			while(out.hasNextLine())
			{
				String show = out.nextLine() ; //Storing the lines in local string variable 
				System.out.println(show) ; //Printing everything that has beed written
			}
			out.close() ; //Closing file after finishing reading
		}
		catch(FileNotFoundException e) //catch block to handle exception
		{
			System.out.println("Error " + e) ;
		}
	}
}