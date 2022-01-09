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
    public partial class FormMRequestConsult : Form
    {
        private DataAccess Da { get; set; }
        private FormMember Fm { get; set; }
        private string MemberID { get; set; }



        public FormMRequestConsult()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        private void PopulateGridView(string sql = "select * from TVet;")
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvVetList.AutoGenerateColumns = false;
            this.dgvVetList.DataSource = ds.Tables[0];
        }



        public FormMRequestConsult(FormMember fm, string s) : this()
        {
            this.MemberID = s;
            this.Fm = fm;
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            var sql = @"Select * from TVet where VetID like '" + this.txtSearch.Text + "%' or VetName like '" + this.txtSearch.Text + "%';";

            this.PopulateGridView(sql);
        }



        private void btnConsult_Click(object sender, EventArgs e)
        {
            try
            {
                string VetID = this.dgvVetList.CurrentRow.Cells[0].Value.ToString();
                DateTime VetConsult = DateTime.Parse(this.dgvVetList.CurrentRow.Cells[2].Value.ToString());
                string Status = (this.dgvVetList.CurrentRow.Cells[2].Value.ToString());

                var qwerForInsertion = @"INSERT INTO  [dbo].[TableRequest] ([MemberID],[VetID] , [Time],[Status] ) VALUES ('" + this.MemberID + "', '" + VetID + "', '" + VetConsult.ToShortDateString() + "','Pending' );";

                int cnt = this.Da.ExecuteUpdateQuery(qwerForInsertion);

                if (cnt == 1)
                {
                    MessageBox.Show("Consult Request Sent Successfuly");
                }
                else
                {
                    MessageBox.Show("Consult Request Sent Failed ");
                }
            }

            catch (Exception exc)
            {
                //if we serach something that is not available then this block runs
                MessageBox.Show("No Row is Selected");

            }

            this.PopulateGridView();
        }



        private void FormVetList_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
            Da.CloseConnection();
        }



        private void dateTimePicker_ValueChanged(object sender, EventArgs e)
        {
            //string sql = @"select * from TVet Where Time like '%" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "%'";
            string sql = @"select * from [dbo].[TVet] WHERE [Time] BETWEEN '" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "' AND '" + Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "' ORDER BY [Time] ASC ";
            this.PopulateGridView(sql);
        }



        private void button1_Click(object sender, EventArgs e)
        {
            this.Hide();

            FormMCheckStatus OrderList = new FormMCheckStatus(this, this.MemberID);
            OrderList.Show();
        }



        private void pictureBoxBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fm.Show();
        }



        private void pictureBoxLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin Fl = new FormLogin();
            Fl.Show();
        }

        private void dtpTo_ValueChanged(object sender, EventArgs e)
        {
            string sql = @"select * from [dbo].[TVet] WHERE [Time] BETWEEN '" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "' AND '" + Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "' ORDER BY [Time] ASC ";
            this.PopulateGridView(sql);
        }
    }
}
