using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Data;
using System.Data.SqlClient;

namespace FinalProject
{
    public class DataAccess
    {
        public string VetID { get; set; }



        private SqlConnection sqlcon;
        public SqlConnection Sqlcon
        {
            get { return sqlcon; }
            set { sqlcon = value; }
        }



        private SqlCommand sqlcom;
        public SqlCommand Sqlcom
        {
            get { return sqlcom; }
            set { sqlcom = value; }
        }



        private SqlDataAdapter sda;
        public SqlDataAdapter Sda
        {
            get { return sda; }
            set { sda = value; }
        }



        private DataSet ds;
        public DataSet Ds
        {
            get { return ds; }
            set { ds = value; }
        }



        private string id;
        public string ID
        {
            get { return id; }
            set { id = value; }
        }



        public DataAccess()
        {
            //this.Sqlcon = new SqlConnection("Data Source=DESKTOP-7VC7BGQ\\SQLEXPRESS;Initial Catalog=Project;Integrated Security=True");  //Anik
            //this.Sqlcon = new SqlConnection("Data Source=DESKTOP-CGVJCB3\\SQLEXPRESS;Initial Catalog=Project;Integrated Security=True");  //Nafiz Laptop
            this.Sqlcon = new SqlConnection("Data Source=DESKTOP-EO8S0A4\\SQLEXPRESS;Initial Catalog=Project;Integrated Security=True");  //Nafiz Computer

            Sqlcon.Open();
        }



        private void QueryText(string query)
        {
            this.Sqlcom = new SqlCommand(query, this.Sqlcon);
        }



        public DataSet ExecuteQuery(string sql)
        {
            this.QueryText(sql);
            this.Sda = new SqlDataAdapter(this.Sqlcom);
            this.Ds = new DataSet();
            this.Sda.Fill(this.Ds);
            return Ds;
        }



        public DataTable ExecuteQueryTable(string sql)
        {
            this.QueryText(sql);
            this.Sda = new SqlDataAdapter(this.Sqlcom);
            this.Ds = new DataSet();
            this.Sda.Fill(this.Ds);
            return Ds.Tables[0];
        }



        public int ExecuteUpdateQuery(string sql)
        {
            this.QueryText(sql);
            int u = this.Sqlcom.ExecuteNonQuery();
            return u;
        }



        public void CloseConnection()
        {
            this.Sqlcon.Close();
        }
    }
}
