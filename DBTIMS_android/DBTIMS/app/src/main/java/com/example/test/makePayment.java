package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Context;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.net.wifi.WifiInfo;
import android.net.wifi.WifiManager;
import android.os.Bundle;
import android.text.format.Formatter;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageButton;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class makePayment extends AppCompatActivity {

    ImageButton img1;
    ImageButton img2;
    EditText txtTransaction;
    Button btn;
    String id;
    Database db;
    JSONObject jsonObject;
    JSONObject jsonProfile;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_make_payment);

        img1=findViewById(R.id.imageButton);
        img2=findViewById(R.id.imageButton2);
        img1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Context ctx=makePayment.this;
                try {
                    Intent i = ctx.getPackageManager().getLaunchIntentForPackage("cn.tydic.ethiopay");
                    ctx.startActivity(i);
                } catch (Exception e) {
                    Toast.makeText(ctx, "It is not installed", Toast.LENGTH_SHORT).show();
                }
            }
        });
        img2.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Context ctx=makePayment.this;
                try {
                    Intent i = ctx.getPackageManager().getLaunchIntentForPackage("com.combanketh.mobilebanking");
                    ctx.startActivity(i);
                } catch (Exception e) {
                    Toast.makeText(ctx, "It is not installed", Toast.LENGTH_SHORT).show();
                }
            }
        });
        txtTransaction=findViewById(R.id.txtTransaction);
        btn=findViewById(R.id.pay);

        btn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String success;
                id = txtTransaction.getText().toString();
                if (txtTransaction.equals("")) {
                    Snackbar.make(view, "Input cannot be empty!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();

                } else {
                    jsonObject = new JSONObject();
                    try {
                        jsonProfile = new JSONObject(getIntent().getStringExtra("jsonProfile"));
                        String license = jsonProfile.getString("id");
                        WifiManager wifiMgr = (WifiManager) getSystemService(WIFI_SERVICE);
                        WifiInfo wifiInfo = wifiMgr.getConnectionInfo();
                        int ip = wifiInfo.getIpAddress();
                        String ipAddress = Formatter.formatIpAddress(ip);
                        // String host=db.getHost(ipAddress);
                        //System.out.println("IP"+host);
                        jsonObject = db.getJSONObjectFromURL("http://192.168.137.1/dbtims/api.php?action=select&query=select * from payment where transaction_id='" + id + "' and license_no='" + license + "'");
                        success = jsonObject.getString("found");
                        if (success.equals("1")) {
                            jsonObject = db.getJSONObjectFromURL("http://192.168.137.1/dbtims/api.php?action=update&query=update drivers set charge = 'paid' where license_no='" + license + "'");
                            Toast.makeText(makePayment.this, "You paid your charge succesfully", Toast.LENGTH_SHORT).show();
                            Intent intent = new Intent(makePayment.this, driverDashboard.class);
                            intent.putExtra("jsonProfile", jsonProfile.toString());

                            startActivity(intent);

                        } else {
                            Snackbar.make(view, "invalid transaction id!", Snackbar.LENGTH_LONG)
                                    .setAction("Action", null).show();


                        }
                    } catch (IOException e) {
                        e.printStackTrace();
                        Toast.makeText(makePayment.this, "Something went wrong", Toast.LENGTH_SHORT).show();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                }
            }
        });

    }
}