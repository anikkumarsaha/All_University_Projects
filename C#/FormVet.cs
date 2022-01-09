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
    public partial class FormVet : Form
    {
        private DataAccess Da { get; set; }
        private FormLogin Fv { get; set; }
        public string VetIDS { get; set; }



        public FormVet()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView("Select * from TableRequest where VetID = '" + VetIDS + "';");
        }



        public FormVet(FormLogin fv) : this()
        {
            this.Fv = fv;
        }



        public FormVet(FormLogin fv, string vetids) : this()
        {
            this.VetIDS = vetids;
            this.Fv = fv;
            this.PopulateGridView("Select * from TableRequest where VetID = '" + VetIDS + "';");
        }



        private void FormReqConsult_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void PopulateGridView()
        {
            string sql = "Select * from TableRequest Where VetID = '" + this.VetIDS + "';";
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvList.AutoGenerateColumns = false;
            this.dgvList.DataSource = ds.Tables[0];
        }



        private void PopulateGridView(string sql)
        {
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvList.AutoGenerateColumns = false;
            this.dgvList.DataSource = ds.Tables[0];
        }



        private void dgvFoodList_DoubleClick(object sender, EventArgs e)
        {
            this.txtSearch.Text = this.dgvList.CurrentRow.Cells["VetName"].Value.ToString();
        }



        private void btnConsultation_Click(object sender, EventArgs e)
        {
            try
            {
                var sql = @"UPDATE TableRequest SET Status = 'Accepted' where ConsulationNumber = '" + this.dgvList.CurrentRow.Cells["ConsulationNumber"].Value.ToString() + "';";
                var ds = this.Da.ExecuteUpdateQuery(sql);
                this.txtSearch.Clear();
            }

            catch (Exception exc)
            {
                MessageBox.Show("No Row is selected\n" + exc.Message);
            }

            PopulateGridView();
        }



        private void btnReject_Click(object sender, EventArgs e)
        {
            try
            {
                var sql = @"UPDATE TableRequest SET Status = 'Rejected' where ConsulationNumber = '" + this.dgvList.CurrentRow.Cells["ConsulationNumber"].Value.ToString() + "';";
                var ds = this.Da.ExecuteUpdateQuery(sql);
                this.txtSearch.Clear();
            }

            catch (Exception exc)
            {
                MessageBox.Show("No Row is selected\n" + exc.Message);
            }

            PopulateGridView();
        }



        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fv.Show();
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            string sql = @"select * from TableRequest
                           Where (ConsulationNumber like '" + this.txtSearch.Text + "%' or MemberID like '" + this.txtSearch.Text + "%' or MemberID like '" + this.txtSearch.Text + "%') and VetID = '" + this.VetIDS + "';";
            this.PopulateGridView(sql);
            Da.CloseConnection();
        }


        private void btnRefresh_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fv.Show();
        }
    }
}
