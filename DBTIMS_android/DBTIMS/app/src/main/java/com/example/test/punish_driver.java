package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;
import android.widget.Toast;

import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;

public class punish_driver extends AppCompatActivity {
    TextView txtReason;
    TextView txtStreet;
    Button btnPunish;
    Spinner spinner;
    JSONObject jsonProfile;
    JSONObject jsonObject;
    JSONObject jsonInsert;
    JSONObject jsonUpdate;
    String reason;
    String street;
    String txtSpinner;
    String license;
    String traffic;
    String now;
    String plate_no;
    Database db;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_punish_driver);
        SimpleDateFormat formatter = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");
        Date date = new Date();
        now=formatter.format(date);
        System.out.println(now);
        txtReason=findViewById(R.id.txtReason);
        txtStreet=findViewById(R.id.txtStreet);
        spinner= findViewById(R.id.spinnerLevel);
        btnPunish=findViewById(R.id.btnPunish);

        try {
            jsonProfile=new JSONObject(getIntent().getStringExtra("jsonProfile"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            jsonObject=new JSONObject(getIntent().getStringExtra("jsonObject"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        btnPunish.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String success = "";
                jsonInsert = new JSONObject();
                reason = txtReason.getText().toString();
                street = txtStreet.getText().toString();
                txtSpinner = spinner.getSelectedItem().toString();
                if (reason.equals("") || (street.equals(""))) {
                    Snackbar.make(view, "Input cannot be empty!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();

                } else {
                    String amount = "";
                    if (txtSpinner.equalsIgnoreCase("high")) {
                        amount = "700";
                    } else if (txtSpinner.equalsIgnoreCase("medium")) {
                        amount = "300";
                    } else if (txtSpinner.equalsIgnoreCase("low")) {
                        amount = "100";
                    }
                    try {
                        license = jsonObject.getString("license_no#0");
                        plate_no = jsonObject.getString("plateNumber#0");
                        traffic = jsonProfile.getString("id");
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    String url = String.format("http://192.168.137.1/dbtims/api.php?action=insert&query=insert into punishment (license_no,plate_no,street_no,reason,punish_date,tp_id,amount) values ('%s','%s','%s','%s','%s','%s',%s)", license, plate_no, street, reason, now, traffic, amount);
                    String url2 = String.format("http://192.168.137.1/dbtims/api.php?action=update&query=update drivers set charge = 'unpaid' where license_no='" + license + "'");
                    System.out.println(url);
                    System.out.println(url2);

                    try {
                        jsonInsert = db.getJSONObjectFromURL(url);

                        success = jsonInsert.getString("successful");
                    } catch (IOException e) {
                        e.printStackTrace();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    if (success.equals("1")) {
                        try {
                            jsonUpdate = db.getJSONObjectFromURL(url2);
                        } catch (IOException e) {
                            e.printStackTrace();
                        } catch (JSONException e) {
                            e.printStackTrace();
                        }
                        Toast.makeText(punish_driver.this, "Punishment Stored Succesfully", Toast.LENGTH_SHORT).show();
                        Intent intent = new Intent(punish_driver.this, view_driver.class);
                        intent.putExtra("jsonProfile", jsonProfile.toString());
                        intent.putExtra("jsonObject", jsonObject.toString());

                        startActivity(intent);
                    } else {
                        Snackbar.make(view, "Something went wrong!", Snackbar.LENGTH_LONG)
                                .setAction("Action", null).show();
                    }
                }
            }
        });

    }
}