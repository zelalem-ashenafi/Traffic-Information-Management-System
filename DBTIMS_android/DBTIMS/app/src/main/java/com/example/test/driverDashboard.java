package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import org.json.JSONException;
import org.json.JSONObject;

public class driverDashboard extends AppCompatActivity {
    Button dr1;
    Button dr2;
    Button dr3;
    Button dr4;
    JSONObject jsonProfile;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_driver_dashboard);

        dr1=findViewById(R.id.dr1);
        dr2=findViewById(R.id.dr2);
        dr3=findViewById(R.id.dr3);
        dr4=findViewById(R.id.btnPunish);
        try {
            jsonProfile=new JSONObject(getIntent().getStringExtra("jsonProfile"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        navigate(dr1,makePayment.class,0);
        navigate(dr2,viewDriver_profile.class,0);
        navigate(dr3,changePassword.class,0);
        navigate(dr4,LoginActivity.class,0);


    }
    public void navigate(Button b1,Class c,int x)
    {
        b1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                Intent intent = new Intent(getApplicationContext(), c);
                intent.putExtra("jsonProfile",jsonProfile.toString());
                if(x==1)
                {
                    intent.addFlags(Intent.FLAG_ACTIVITY_NO_HISTORY);
                }
                startActivity(intent);
            }
        });
    }


}