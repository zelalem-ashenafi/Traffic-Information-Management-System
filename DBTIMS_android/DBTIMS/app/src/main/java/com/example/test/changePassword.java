package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.Bundle;
import android.text.format.Formatter;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class changePassword extends AppCompatActivity {
    EditText txtNew;
    EditText txtOld;
    JSONObject jsonProfile;
    JSONObject jsonObject;
    Database db = new Database();
    Button change;
    String success="";
    String role="";
    String id="";
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_password);

        txtNew=findViewById(R.id.txtNew);
        txtOld=findViewById(R.id.txtOld);
        change=findViewById(R.id.btnChange);
        change.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String strOld = txtOld.getText().toString();
                String strNew = txtNew.getText().toString();
                if (strOld.equals("") || (strNew.equals(""))) {
                    Snackbar.make(view, "Input cannot be empty!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();

                } else
                {
                    try {
                        jsonProfile = new JSONObject(getIntent().getStringExtra("jsonProfile"));
                        role = jsonProfile.getString("role");
                        id = jsonProfile.getString("id");

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                try {


                    jsonObject = new JSONObject();
                    WifiManager wifiMgr = (WifiManager) getSystemService(WIFI_SERVICE);
                    WifiInfo wifiInfo = wifiMgr.getConnectionInfo();
                    int ip = wifiInfo.getIpAddress();
                    String ipAddress = Formatter.formatIpAddress(ip);


                    String url = "http://192.168.137.1/dbtims/api.php?action=forget&old=" + strOld + "&new=" + strNew + "&role=" + role + "&id=" + id;

                    System.out.println(url);
                    jsonObject = db.getJSONObjectFromURL(url);
                } catch (IOException e) {
                    e.printStackTrace();
                } catch (JSONException e) {
                    e.printStackTrace();
                }
                try {
                    success = jsonObject.getString("successful");
                } catch (JSONException e) {
                    e.printStackTrace();
                }

                if (success.equals("1")) {
                    Toast.makeText(changePassword.this, "Password resseted Successfully", Toast.LENGTH_SHORT).show();
                    if (role.equals("driver")) {
                        Intent intent = new Intent(changePassword.this, driverDashboard.class);

                        intent.putExtra("jsonProfile", jsonProfile.toString());

                        startActivity(intent);
                    } else {
                        Intent intent = new Intent(changePassword.this, trafficDashboard.class);

                        intent.putExtra("jsonProfile", jsonProfile.toString());

                        startActivity(intent);
                    }
                } else {
                    Snackbar.make(view, "incorrect old password!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();


                }

            }
        }
        });



    }
}