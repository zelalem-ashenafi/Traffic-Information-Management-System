package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.widget.TextView;

import org.json.JSONException;
import org.json.JSONObject;


public class viewTrafficProfile extends AppCompatActivity {
    JSONObject jsonProfile;
    TextView labelProfID;
    TextView labelProfName;
    TextView labelProfEmail;
    TextView labelProfPhone;
    TextView labelProfBirth;
    TextView labelProfLoc;
    String[] jsonArray=new String[10];
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_view_traffic_profile);
        labelProfID=(TextView) findViewById(R.id.ProfID);
        labelProfName=findViewById(R.id.ProfName);
        labelProfEmail=findViewById(R.id.ProfEmail);
        labelProfPhone=findViewById(R.id.ProfPhone);
        labelProfBirth=findViewById(R.id.ProfBirth);
        labelProfLoc=findViewById(R.id.ProfLoc);


        try {
            jsonProfile=new JSONObject(getIntent().getStringExtra("jsonProfile"));
            System.out.println("YES "+ jsonProfile.toString());
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            String id= jsonProfile.getString("id");

            jsonArray[0]=jsonProfile.getString("id");
            jsonArray[1]=jsonProfile.getString("fname")+" "+jsonProfile.getString("lname");
            jsonArray[2]=jsonProfile.getString("email");
            jsonArray[3]=jsonProfile.getString("phone");
            jsonArray[4]=jsonProfile.getString("birth_date");
            jsonArray[5]=jsonProfile.getString("location");

        } catch (JSONException e) {
            e.printStackTrace();
        }
        labelProfID.setText(jsonArray[0]);
        labelProfName.setText(jsonArray[1]);
        labelProfEmail.setText(jsonArray[2]);
        labelProfPhone.setText(jsonArray[3]);
        labelProfBirth.setText(jsonArray[4]);
        labelProfLoc.setText(jsonArray[5]);


    }
}