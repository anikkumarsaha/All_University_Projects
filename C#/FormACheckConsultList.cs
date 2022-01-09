using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace FinalProject
{
    public partial class FormACheckConsultList : Form
    {
        private DataAccess Da { get; set; }
        private FormAdmin Fv { get; set; }



        public FormACheckConsultList()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        public FormACheckConsultList(FormAdmin fv) : this()
        {
            this.Fv = fv;
        }



        private void PopulateGridView(string sql = "Select * from TableRequest")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvList.AutoGenerateColumns = false;
            this.dgvList.DataSource = ds.Tables[0];
        }



        private void FormHistory_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void btnBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fv.Show();
        }



        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            string sql = @"select * from TableRequest Where MemberID like '" + this.txtSearch.Text + "%' or VetID like '" + this.txtSearch.Text + "%' or Time like '" + this.txtSearch.Text + "%' or Status like '" + this.txtSearch.Text + "%' or ConsulationNumber like '" + this.txtSearch.Text + "%'";
            this.PopulateGridView(sql);
            Da.CloseConnection();
        }



        private void dateTimePicker1_ValueChanged(object sender, EventArgs e)
        {
            //Used to Search with one date
           // string sql = @"select * from TableRequest Where Time like '%" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "%'"; 

            // Now Searches between two dates 
            string sql = @"select * from [dbo].[TableRequest] WHERE [Time] BETWEEN '"+Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString()+"' AND '"+ Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "' ORDER BY [Time] ASC ";
            Console.WriteLine(sql);
            this.PopulateGridView(sql);
            Da.CloseConnection();
        }

        private void btnrefresh_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fv.Show();
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin fl = new FormLogin();
            fl.Show();
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void dtpTo_ValueChanged(object sender, EventArgs e)
        {
            string sql = @"select * from [dbo].[TableRequest] WHERE [Time] BETWEEN '" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "' AND '" + Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "' ORDER BY [Time] ASC ";
            //MessageBox.Show(sql);
            this.PopulateGridView(sql);
        }
    }
}
