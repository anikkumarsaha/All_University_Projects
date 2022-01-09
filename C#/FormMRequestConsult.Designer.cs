
namespace FinalProject
{
    partial class FormMRequestConsult
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(FormMRequestConsult));
            this.panel2 = new System.Windows.Forms.Panel();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.dtpTo = new System.Windows.Forms.DateTimePicker();
            this.dgvVetList = new System.Windows.Forms.DataGridView();
            this.VetID = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.VetName = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.VetConsult = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.btnCheckStatus = new System.Windows.Forms.Button();
            this.pictureBoxLogout = new System.Windows.Forms.PictureBox();
            this.pictureBoxBack = new System.Windows.Forms.PictureBox();
            this.dtpFrom = new System.Windows.Forms.DateTimePicker();
            this.btnConsult = new System.Windows.Forms.Button();
            this.txtSearch = new System.Windows.Forms.TextBox();
            this.label1 = new System.Windows.Forms.Label();
            this.panel2.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvVetList)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxLogout)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxBack)).BeginInit();
            this.SuspendLayout();
            // 
            // panel2
            // 
            this.panel2.BackColor = System.Drawing.SystemColors.MenuHighlight;
            this.panel2.Controls.Add(this.label3);
            this.panel2.Controls.Add(this.label2);
            this.panel2.Controls.Add(this.dtpTo);
            this.panel2.Controls.Add(this.dgvVetList);
            this.panel2.Controls.Add(this.btnCheckStatus);
            this.panel2.Controls.Add(this.pictureBoxLogout);
            this.panel2.Controls.Add(this.pictureBoxBack);
            this.panel2.Controls.Add(this.dtpFrom);
            this.panel2.Controls.Add(this.btnConsult);
            this.panel2.Controls.Add(this.txtSearch);
            this.panel2.Controls.Add(this.label1);
            this.panel2.Dock = System.Windows.Forms.DockStyle.Fill;
            this.panel2.Location = new System.Drawing.Point(0, 0);
            this.panel2.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.panel2.Name = "panel2";
            this.panel2.Size = new System.Drawing.Size(732, 421);
            this.panel2.TabIndex = 3;
            // 
            // label3
            // 
            this.label3.AutoSize = true;
            this.label3.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label3.Location = new System.Drawing.Point(374, 52);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(19, 15);
            this.label3.TabIndex = 31;
            this.label3.Text = "to";
            // 
            // label2
            // 
            this.label2.AutoSize = true;
            this.label2.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label2.Location = new System.Drawing.Point(281, 29);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(91, 15);
            this.label2.TabIndex = 30;
            this.label2.Text = "Search by Date";
            // 
            // dtpTo
            // 
            this.dtpTo.CalendarMonthBackground = System.Drawing.SystemColors.GradientActiveCaption;
            this.dtpTo.CustomFormat = "MM/dd/yyyy";
            this.dtpTo.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.dtpTo.Format = System.Windows.Forms.DateTimePickerFormat.Custom;
            this.dtpTo.Location = new System.Drawing.Point(399, 46);
            this.dtpTo.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.dtpTo.Name = "dtpTo";
            this.dtpTo.Size = new System.Drawing.Size(91, 23);
            this.dtpTo.TabIndex = 29;
            this.dtpTo.ValueChanged += new System.EventHandler(this.dtpTo_ValueChanged);
            // 
            // dgvVetList
            // 
            this.dgvVetList.AllowUserToAddRows = false;
            this.dgvVetList.AllowUserToDeleteRows = false;
            this.dgvVetList.BackgroundColor = System.Drawing.SystemColors.GradientActiveCaption;
            this.dgvVetList.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dgvVetList.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.VetID,
            this.VetName,
            this.VetConsult});
            this.dgvVetList.Dock = System.Windows.Forms.DockStyle.Bottom;
            this.dgvVetList.Location = new System.Drawing.Point(0, 89);
            this.dgvVetList.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.dgvVetList.MultiSelect = false;
            this.dgvVetList.Name = "dgvVetList";
            this.dgvVetList.ReadOnly = true;
            this.dgvVetList.RowHeadersWidth = 51;
            this.dgvVetList.RowTemplate.Height = 29;
            this.dgvVetList.SelectionMode = System.Windows.Forms.DataGridViewSelectionMode.FullRowSelect;
            this.dgvVetList.Size = new System.Drawing.Size(732, 332);
            this.dgvVetList.TabIndex = 2;
            // 
            // VetID
            // 
            this.VetID.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.VetID.DataPropertyName = "VetID";
            this.VetID.HeaderText = "Veterinarian ID";
            this.VetID.MinimumWidth = 10;
            this.VetID.Name = "VetID";
            this.VetID.ReadOnly = true;
            // 
            // VetName
            // 
            this.VetName.AutoSizeMode = System.Windows.Forms.DataGridViewAutoSizeColumnMode.Fill;
            this.VetName.DataPropertyName = "VetName";
            this.VetName.HeaderText = "Veterinarian Name";
            this.VetName.MinimumWidth = 6;
            this.VetName.Name = "VetName";
            this.VetName.ReadOnly = true;
            // 
            // VetConsult
            // 
            this.VetConsult.DataPropertyName = "Time";
            this.VetConsult.HeaderText = "Consultaion Date";
            this.VetConsult.MinimumWidth = 10;
            this.VetConsult.Name = "VetConsult";
            this.VetConsult.ReadOnly = true;
            this.VetConsult.Width = 125;
            // 
            // btnCheckStatus
            // 
            this.btnCheckStatus.BackColor = System.Drawing.SystemColors.GradientActiveCaption;
            this.btnCheckStatus.FlatAppearance.BorderColor = System.Drawing.SystemColors.Highlight;
            this.btnCheckStatus.FlatStyle = System.Windows.Forms.FlatStyle.Flat;
            this.btnCheckStatus.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnCheckStatus.Location = new System.Drawing.Point(45, 9);
            this.btnCheckStatus.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnCheckStatus.Name = "btnCheckStatus";
            this.btnCheckStatus.Size = new System.Drawing.Size(95, 30);
            this.btnCheckStatus.TabIndex = 28;
            this.btnCheckStatus.Text = "Check Status";
            this.btnCheckStatus.UseVisualStyleBackColor = false;
            this.btnCheckStatus.Click += new System.EventHandler(this.button1_Click);
            // 
            // pictureBoxLogout
            // 
            this.pictureBoxLogout.BackColor = System.Drawing.Color.Transparent;
            this.pictureBoxLogout.Image = global::FinalProject.Properties.Resources.blue_exit_icon_8;
            this.pictureBoxLogout.Location = new System.Drawing.Point(682, 0);
            this.pictureBoxLogout.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.pictureBoxLogout.Name = "pictureBoxLogout";
            this.pictureBoxLogout.Size = new System.Drawing.Size(47, 30);
            this.pictureBoxLogout.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.pictureBoxLogout.TabIndex = 27;
            this.pictureBoxLogout.TabStop = false;
            this.pictureBoxLogout.Click += new System.EventHandler(this.pictureBoxLogout_Click);
            // 
            // pictureBoxBack
            // 
            this.pictureBoxBack.Image = global::FinalProject.Properties.Resources.backBtn1;
            this.pictureBoxBack.Location = new System.Drawing.Point(599, 0);
            this.pictureBoxBack.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.pictureBoxBack.Name = "pictureBoxBack";
            this.pictureBoxBack.Size = new System.Drawing.Size(77, 30);
            this.pictureBoxBack.SizeMode = System.Windows.Forms.PictureBoxSizeMode.Zoom;
            this.pictureBoxBack.TabIndex = 26;
            this.pictureBoxBack.TabStop = false;
            this.pictureBoxBack.Click += new System.EventHandler(this.pictureBoxBack_Click);
            // 
            // dtpFrom
            // 
            this.dtpFrom.CalendarMonthBackground = System.Drawing.SystemColors.GradientActiveCaption;
            this.dtpFrom.CustomFormat = "MM/dd/yyyy";
            this.dtpFrom.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.dtpFrom.Format = System.Windows.Forms.DateTimePickerFormat.Custom;
            this.dtpFrom.Location = new System.Drawing.Point(281, 46);
            this.dtpFrom.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.dtpFrom.Name = "dtpFrom";
            this.dtpFrom.Size = new System.Drawing.Size(91, 23);
            this.dtpFrom.TabIndex = 25;
            this.dtpFrom.ValueChanged += new System.EventHandler(this.dateTimePicker_ValueChanged);
            // 
            // btnConsult
            // 
            this.btnConsult.BackColor = System.Drawing.SystemColors.GradientActiveCaption;
            this.btnConsult.FlatStyle = System.Windows.Forms.FlatStyle.Popup;
            this.btnConsult.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.btnConsult.Location = new System.Drawing.Point(546, 49);
            this.btnConsult.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.btnConsult.Name = "btnConsult";
            this.btnConsult.Size = new System.Drawing.Size(155, 21);
            this.btnConsult.TabIndex = 22;
            this.btnConsult.Text = "Request for Consult";
            this.btnConsult.UseVisualStyleBackColor = false;
            this.btnConsult.Click += new System.EventHandler(this.btnConsult_Click);
            // 
            // txtSearch
            // 
            this.txtSearch.BackColor = System.Drawing.SystemColors.GradientActiveCaption;
            this.txtSearch.Location = new System.Drawing.Point(145, 47);
            this.txtSearch.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.txtSearch.Name = "txtSearch";
            this.txtSearch.Size = new System.Drawing.Size(110, 23);
            this.txtSearch.TabIndex = 9;
            this.txtSearch.TextChanged += new System.EventHandler(this.txtSearch_TextChanged);
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Font = new System.Drawing.Font("Segoe UI", 9F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point);
            this.label1.Location = new System.Drawing.Point(10, 50);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(129, 15);
            this.label1.TabIndex = 8;
            this.label1.Text = "Search by name or ID:";
            // 
            // FormMRequestConsult
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(7F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(732, 421);
            this.Controls.Add(this.panel2);
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedSingle;
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Margin = new System.Windows.Forms.Padding(3, 2, 3, 2);
            this.MaximizeBox = false;
            this.Name = "FormMRequestConsult";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Veterinarian List";
            this.FormClosed += new System.Windows.Forms.FormClosedEventHandler(this.FormVetList_FormClosed);
            this.panel2.ResumeLayout(false);
            this.panel2.PerformLayout();
            ((System.ComponentModel.ISupportInitialize)(this.dgvVetList)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxLogout)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBoxBack)).EndInit();
            this.ResumeLayout(false);

        }

        #endregion

        private System.Windows.Forms.Panel panel2;
        private System.Windows.Forms.Button btnConsult;
        private System.Windows.Forms.TextBox txtSearch;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DateTimePicker dtpFrom;
        private System.Windows.Forms.PictureBox pictureBoxBack;
        private System.Windows.Forms.PictureBox pictureBoxLogout;
        private System.Windows.Forms.Button btnCheckStatus;
        private System.Windows.Forms.DataGridView dgvVetList;
        private System.Windows.Forms.DataGridViewTextBoxColumn VetID;
        private System.Windows.Forms.DataGridViewTextBoxColumn VetName;
        private System.Windows.Forms.DataGridViewTextBoxColumn VetConsult;
        private System.Windows.Forms.DateTimePicker dtpTo;
        private System.Windows.Forms.Label label3;
        private System.Windows.Forms.Label label2;
    }
}