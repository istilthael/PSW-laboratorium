<%@ Page Language="C#"  AutoEventWireup="true" Inherits="poll" CodeFile="poll.aspx.cs" %>
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
    <hr><br>

    <section>
        

        <h2>User poll about website</h2><br>

        <form autocomplete="on" runat=server>

            <asp:ValidationSummary runat=server HeaderText="There were errors on the page:" />

            Age upper threshold:<br>
            <input type="text" runat=server autofocus id="ageCompare" value=100 disabled><br><br>


            Age:<br>
            <input type="text" runat=server autofocus id="txtAge"> 
            <asp:CompareValidator runat="server" id="cmpNumbers" controltovalidate="txtAge" controltocompare="ageCompare" operator="LessThan" type="Integer" errormessage="The age must be lower than stated value! " />
            <asp:RangeValidator runat="server" id="rngAge" controltovalidate="txtAge" type="Integer" minimumvalue="1" maximumvalue="150" errormessage="Please enter an age b" />
            <br /><br>



            <asp:RequiredFieldValidator runat=server ControlToValidate=txtName ErrorMessage="Name is required.">*</asp:RequiredFieldValidator>Name:<br>
            <input type="text" runat=server id="txtName"><br><br>



            Email:<br>
            <input type="text" runat=server id="txtEmail">
            <asp:RegularExpressionValidator runat="server" id="rexNumber" controltovalidate="txtEmail" validationexpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*" errormessage="Please enter a valid email!" />
            <br><br>
        
<asp:ScriptManager ID="ScriptManager1" runat="server">
    </asp:ScriptManager>
            <asp:UpdatePanel ID="myUpdatePanel" runat="server">
            <ContentTemplate>
            <asp:Label ID="lblAge" Visible=false runat="server" AssociatedControlID="sample">Sample</asp:Label>
             <asp:TextBox Visible=false ID="sample" runat="server" value=""/>
            <asp:Button ID="Button1" runat="server" Text="Button" usesubmitbehavior="true" OnClick="ShowLabel"/>
         
                </ContentTemplate>
            </asp:UpdatePanel>
                <input type="submit" runat=server value="Submit" id="cmdSubmit">

        </form>

    </section>

</body>
</html>
