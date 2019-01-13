<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="shop.aspx.cs" Inherits="WebApplication1.Content.shop" %>

<!doctype html>

<html lang="en">
<head>

    <meta charset="utf-8">
    <title>Detailed poll</title>
    <meta name="description" content="Detailed poll">
    <meta name="keywords" content="HTML,POLL">
    <meta name="author" content="D">
    <link rel="stylesheet" type="text/css" href="poll.css">

</head>
<body>

    <nav>
        <a href="index.html">Back to the main page</a>
    </nav>
    <hr><br/>

    <section>
        

        <h2>Select products:</h2><br/>

        <form autocomplete="on" runat=server> 
            <asp:ScriptManager ID="ScriptManager1" runat="server">
            </asp:ScriptManager>
            <asp:UpdatePanel ID="myUpdatePanel" runat="server">
                <ContentTemplate>
            <asp:RadioButtonList ID="rblist1" runat="server" AutoPostBack="True">

                 <asp:ListItem Text ="Item1" Value="Dom" />
                 <asp:ListItem Text ="Item2" Value="Ogród" />

                
             </asp:RadioButtonList><br/><br />

            <asp:CheckBoxList id="checkboxlist1" 
                           AutoPostBack="True"
                            Visible="false"
                           runat="server">
 
                         <asp:ListItem></asp:ListItem>
                         <asp:ListItem></asp:ListItem>
 
             </asp:CheckBoxList>
                    <asp:CheckBoxList id="checkboxlist2" 
                           AutoPostBack="True"
                            Visible="false"
                           runat="server">
 
                         <asp:ListItem></asp:ListItem>
                         <asp:ListItem></asp:ListItem>
 
             </asp:CheckBoxList>
                    <asp:Button ID="Button1" value="Dodaj do koszyka" runat="server" Text="Button" usesubmitbehavior="true" OnClick="Add"/><br /><br />
                    
                                        <asp:Label ID="Label1" runat="server">Ilosc produktow w koszyku: </asp:Label>

                     </ContentTemplate>
            </asp:UpdatePanel>
            
               <br /><br /><a href="Checkout.aspx">Pokaż koszyk</a>

        </form>

    </section>

</body>
</html>