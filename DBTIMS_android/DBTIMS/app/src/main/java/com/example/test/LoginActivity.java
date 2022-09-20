package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.Bundle;
import android.text.format.Formatter;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.ProgressBar;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class LoginActivity extends AppCompatActivity {
    static Button btnLogin;
    static TextView txtEmail;
    static  TextView txtPassword;
    Database db=new Database();
    JSONObject jsonObject;
    ProgressBar progress1;
    Spinner spinner;
    String[] country={"Driver","Traffic Police"};;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        txtEmail=findViewById(R.id.txtEmail);
        txtPassword=findViewById(R.id.txtPassword);
        progress1=findViewById(R.id.progrss1);
        progress1.setVisibility(View.INVISIBLE);
        String strEmail=txtEmail.getText().toString();
        String strPassword=txtPassword.getText().toString();
        spinner=findViewById(R.id.spinnerChoose);
        btnLogin= (Button) findViewById(R.id.btnLogin);

        ArrayAdapter aa = new ArrayAdapter(this,android.R.layout.simple_spinner_item,country);
        aa.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        //Setting the ArrayAdapter data on the Spinner
        spinner.setAdapter(aa);
        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                progress1.setVisibility(View.VISIBLE);
                String strEmail=txtEmail.getText().toString();
                String strPassword=txtPassword.getText().toString();
                String spin=spinner.getSelectedItem().toString();
                String found="";
                String role="";
                if(strEmail.equals("")||(strPassword.equals("")))
                {
                    Snackbar.make(view, "Input cannot be empty!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();
                    progress1.setVisibility(View.INVISIBLE);
                }
                else{
                try {
                    jsonObject=new JSONObject();
                    WifiManager wifiMgr = (WifiManager) getSystemService(WIFI_SERVICE);
                    WifiInfo wifiInfo = wifiMgr.getConnectionInfo();
                    int ip = wifiInfo.getIpAddress();
                    String ipAddress = Formatter.formatIpAddress(ip);
                    String host=db.getHost(ipAddress);
                    System.out.println("IP"+host);
                    String url="http://192.168.137.1/dbtims/api.php?action=login&email="+strEmail+"&password="+strPassword;
                    System.out.println(url);
                    jsonObject=db.getJSONObjectFromURL(url);
                } catch (IOException e) {
                    e.printStackTrace();
                    Toast.makeText(LoginActivity.this, "Network error!", Toast.LENGTH_SHORT).show();
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                try {
                    found= jsonObject.getString("found");
                    if(found.equals("1"))
                    role= jsonObject.getString("role");

                } catch (JSONException e) {
                    e.printStackTrace();
                }

                if(found.equals("1") && role.equals("traffic_police")&&spin.equalsIgnoreCase("traffic police")) {
                    Toast.makeText(LoginActivity.this, "Signed in succesfully, Welcome.", Toast.LENGTH_SHORT).show();
                    Intent intent = new Intent(LoginActivity.this, trafficDashboard.class);
                    intent.putExtra("jsonProfile",jsonObject.toString());
                    startActivity(intent);

                }else if(found.equals("1") && role.equals("driver")&&spin.equalsIgnoreCase("driver")) {
                    Toast.makeText(LoginActivity.this, "Signed in succesfully, Welcome.", Toast.LENGTH_SHORT).show();
                    progress1.setVisibility(View.INVISIBLE);
                    Intent intent = new Intent(LoginActivity.this, driverDashboard.class);
                    intent.putExtra("jsonProfile",jsonObject.toString());
                    startActivity(intent);

                }
                else{
                    Snackbar.make(view, "Incorrect!! or deactivated by Admin!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();
                    progress1.setVisibility(View.INVISIBLE);
                }
            }
            }
        });

    }
}