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
    public partial class FormMember : Form
    {
        private FormLogin Fl { get; set; }
        private string MemberID { get; set; }



        public FormMember()
        {
            InitializeComponent();
        }



        public FormMember(FormLogin fl) : this()
        {
            this.Fl = fl;
        }



        public FormMember(FormLogin fl, string memberid) : this()
        {
            this.MemberID = memberid;
            this.Fl = fl;
        }



        private void FormMember_FormClosed(object sender, FormClosedEventArgs e)
        {
            Application.Exit();
        }



        private void btnConfirm_Click(object sender, EventArgs e)
        {
            if (this.rbConsult.Checked)
            {
                this.Hide();
                FormMRequestConsult vetList = new FormMRequestConsult(this, MemberID);
                vetList.Show();
            }

            else if (this.rbPurchase.Checked)
            {
                this.Hide();
                FormMPurchaseFoods foodList = new FormMPurchaseFoods(this, MemberID);
                foodList.Show();
            }

            else
            {
                MessageBox.Show("Select an option first");
            }
        }



        private void pictureBoxLogout_Click(object sender, EventArgs e)
        {
            this.Hide();
            Fl.Show();
        }
    }
}
