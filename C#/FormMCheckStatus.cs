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
    public partial class FormMCheckStatus : Form
    {
        private string MemberID { get; set; }

        private DataAccess Da { get; set; }
        private FormMRequestConsult Frc { get; set; }



        public FormMCheckStatus()
        {
            InitializeComponent();
            this.Da = new DataAccess();
            this.PopulateGridView();
        }



        private void PopulateGridView()
        {
            string sql = "Select VetID,Time,Status from TableRequest Where MemberID = '" + this.MemberID + "'";
            var ds = this.Da.ExecuteQuery(sql);
            this.dgvConsultStatus.AutoGenerateColumns = false;
            this.dgvConsultStatus.DataSource = ds.Tables[0];
        }



        private void PopulateGridView(string s)
        {
            var ds = this.Da.ExecuteQuery(s);
            this.dgvConsultStatus.AutoGenerateColumns = false;
            this.dgvConsultStatus.DataSource = ds.Tables[0];
        }



        public FormMCheckStatus(FormMRequestConsult frc, string s) : this()
        {
            this.MemberID = s;
            this.Frc = frc;
            this.PopulateGridView("Select VetID,Time,Status from TableRequest where MemberID = '" + this.MemberID + "';");
        }



        private void txtSearch_TextChanged(object sender, EventArgs e)
        {
            string sql = @"select * from TableRequest
                           Where ( VetID like '" + this.txtSearch.Text + "%' or Status like '" + this.txtSearch.Text + "%') and MemberID = '" + this.MemberID + "';";
            this.PopulateGridView(sql);
        }



        private void dateTimePicker_ValueChanged(object sender, EventArgs e)
        {
            //string sql = @"select VetID,Status,Time from TableRequest Where Time like '%" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "%'"; 
            string sql = @"select VetID,Status,Time from [dbo].[TableRequest] WHERE ( [Time] BETWEEN '" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "' AND '" + Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "') and MemberID = '" +this.MemberID+"' ORDER BY [Time] ASC ";


            this.PopulateGridView(sql);
        }



        private void btnShow_Click(object sender, EventArgs e)
        {
            this.PopulateGridView();
        }



        private void FormMCheckStatus_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
            Da.CloseConnection();
        }



        private void pictureBoxLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormLogin Fl = new FormLogin();
            Fl.Show();
        }



        private void pictureBoxBack_Click(object sender, EventArgs e)
        {
            this.Hide();
            Frc.Show();
        }

        private void dtpTo_ValueChanged(object sender, EventArgs e)
        {
            string sql = @"select VetID,Status,Time from [dbo].[TableRequest] WHERE ( [Time] BETWEEN '" + Convert.ToDateTime(this.dtpFrom.Text).ToShortDateString() + "' AND '" + Convert.ToDateTime(this.dtpTo.Text).ToShortDateString() + "') and MemberID = '" + this.MemberID + "' ORDER BY [Time] ASC "; 
            this.PopulateGridView(sql);
        }
    }
}
//
//
