<tr>
    <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
            <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: 'Muli', sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;"> <br>
                    
                    {{-- <center><p style="margin: 0;">© 2020 <a href="https://efinanceng.com/" target="_blank" style="color: #111111; font-weight: 700;">E-Finance</a>. All rights reserved.</p></center> --}}
                    <center><{{ Illuminate\Mail\Markdown::parse($slot) }}</center>
                </td>
            </tr>
        </table>
    </td>
</tr>