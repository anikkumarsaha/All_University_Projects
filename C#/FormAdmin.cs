using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;

namespace FinalProject
{
    public partial class FormAdmin : Form
    {
        private FormLogin Fl { get; set; }



        public FormAdmin()
        {
            InitializeComponent();
        }



        public FormAdmin(FormLogin fl) : this()
        {
            this.Fl = fl;
        }



        private void btnLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fl.Show();
        }



        private void FormAdmin_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void btnOrder_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormACheckPurchaseList OrderList = new FormACheckPurchaseList(this);
            OrderList.Show();
        }



        private void btnConsultation_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormACheckConsultList OrderList = new FormACheckConsultList(this);
            OrderList.Show();
        }



        private void btnAddUser_Click(object sender, EventArgs e)
        {
            this.Hide();
            FormAManipulateUsers f = new FormAManipulateUsers(this);
            f.Show();
        }


        private void pictureBox2_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fl.Show();
        }
    }
}
