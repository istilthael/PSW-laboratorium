using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace WebApplication1.Content
{
    public partial class order : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {
            if (!Page.IsPostBack)
            {
                thanks.InnerHtml = "Dziękujemy za złożenie zamówienia na kwotę: " + Session["sum"];
                Session.Abandon();
            }
        }
    }
}