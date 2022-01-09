public class student extends CommonFeatures //Inheriting Abstract class// Must give body to every abstract method
{
	student()//Default constructor because parameterized constructor is declared. So default constructor constructor won't generate if not declared
	{
		System.out.println(" ") ;
	}
	
	//Receving parameters from operations class
	student(String name , String id , String department , String cgpa)
	{
		this.Name = name ;
		this.Id = id ;
		this.Department = department ;
		this.Cgpa = cgpa ;
	}
	
	//Public setter method for setting values
	public void setName(String Name)
	{
		this.Name = Name ;
	}
	public void setId(String Id)
	{
		this.Id = Id ;
	}
	public void setDepartment(String Department)
	{
		this.Department = Department ;
	}
	public void setCgpa(String Cgpa)
	{
		this.Cgpa = Cgpa ;
	}
	
	//Public getter methods for getting values
	public String getName()
	{
		return this.Name ;
	}
	public String getId()
	{
		return this.Id ;
	}
	public String getDepartment()
	{
		return this.Department ;
	}
	public String getCgpa()
	{
		return this.Cgpa ;
	}
}