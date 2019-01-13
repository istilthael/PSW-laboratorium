using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Windows;

public partial class poll : System.Web.UI.Page
{

    //protected global::System.Web.UI.WebControls.Label lblAge;
    //protected global::System.Web.UI.WebControls.TextBox sample;

    public poll()
    {
        //
        // TODO: Add constructor logic here
        //
    }

    protected void ShowLabel(object sender, EventArgs e)
    {
        Console.WriteLine(Environment.CommandLine);
        lblAge.Visible = true;
        sample.Visible = true;
     


    }

    protected void Page_Load(object sender, EventArgs e)
    {
        if (Page.IsPostBack)
        {
            lblAge.Text = "Age: ";
            sample.Text = txtAge.Value;
        }
    }

}
