package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import org.json.JSONException;
import org.json.JSONObject;

public class view_driver extends AppCompatActivity {
    JSONObject jsonObject;
    TextView labelID;
    TextView labelName;
    TextView labelSex;
    TextView labelLevel;
    TextView labelAddress;
    TextView labelPhone;
    TextView labelExp;
    TextView labelCharge;
    TextView labelPlate;
    Button btnPenalityRecord;
    Button btnPunishRecord;
    Button btnAccidentRegister;
    JSONObject jsonProfile;


    String[] jsonArray=new String[10];
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_driver);
        labelID=findViewById(R.id.labelID);
        labelName=findViewById(R.id.labelName);
        labelSex=findViewById(R.id.labelSex);
        labelLevel=findViewById(R.id.labelLevel);
        labelAddress=findViewById(R.id.labelAddress);
        labelPhone=findViewById(R.id.labelPhone);
        labelExp=findViewById(R.id.labelExp);
        labelCharge=findViewById(R.id.labelCharge);
        labelPlate=findViewById(R.id.labelPlate);
        btnPenalityRecord = findViewById(R.id.penality);
        btnPunishRecord = findViewById(R.id.punish);
        btnAccidentRegister= findViewById(R.id.register);

        try {
            jsonObject=new JSONObject(getIntent().getStringExtra("jsonObject"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            jsonProfile=new JSONObject(getIntent().getStringExtra("jsonProfile"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        System.out.println(jsonObject.toString());
        try {
            jsonArray[0]=jsonObject.getString("license_no#0");
            jsonArray[1]=jsonObject.getString("fname#0")+" "+jsonObject.getString("lname#0");
            jsonArray[2]=jsonObject.getString("sex#0");
            jsonArray[3]=jsonObject.getString("level#0");
            jsonArray[4]=jsonObject.getString("address#0");
            jsonArray[5]=jsonObject.getString("phone#0");
            jsonArray[6]=jsonObject.getString("license_ex_date#0");
            jsonArray[7]=jsonObject.getString("charge#0");
            jsonArray[8]=jsonObject.getString("plateNumber#0");
        } catch (JSONException e) {
            e.printStackTrace();
        }
        labelID.setText(jsonArray[0]);
        labelName.setText(jsonArray[1]);
        labelSex.setText(jsonArray[2]);
        labelLevel.setText(jsonArray[3]);
        labelAddress.setText(jsonArray[4]);
        labelPhone.setText(jsonArray[5]);
        labelExp.setText(jsonArray[6]);
        labelCharge.setText(jsonArray[7]);
        labelPlate.setText(jsonArray[8]);


        btnPenalityRecord.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view_driver.this,penalityList.class);
                intent.putExtra("jsonObject",jsonObject.toString());
                startActivity(intent);
            }
        });

        btnPunishRecord.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view_driver.this,punish_driver.class);
                intent.putExtra("jsonProfile",jsonProfile.toString());
                intent.putExtra("jsonObject",jsonObject.toString());
                System.out.println(jsonProfile.toString());
                startActivity(intent);
            }
        });
        btnAccidentRegister.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(view_driver.this,registerAccident.class);
                intent.putExtra("jsonProfile",jsonProfile.toString());
                intent.putExtra("jsonObject",jsonObject.toString());
                System.out.println(jsonProfile.toString());
                startActivity(intent);
            }
        });
    }
}