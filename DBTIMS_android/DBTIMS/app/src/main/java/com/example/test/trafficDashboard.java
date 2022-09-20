package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;

import org.json.JSONException;
import org.json.JSONObject;

public class trafficDashboard extends AppCompatActivity {
    Button button1;
    Button button2;
    Button button3;
    Button button4;
    JSONObject jsonProfile;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_traffic_dashboard);

        button1=findViewById(R.id.button1);
        button2=findViewById(R.id.button2);
        button3=findViewById(R.id.button3);
        button4=findViewById(R.id.btnPunish);
        try {
            jsonProfile=new JSONObject(getIntent().getStringExtra("jsonProfile"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        navigate(button1,MainActivity.class,0);
        navigate(button2,viewTrafficProfile.class,0);
        navigate(button3,changePassword.class,0);
        navigate(button4,LoginActivity.class,1);


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
                intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
            }
            startActivity(intent);
        }
    });
}


}