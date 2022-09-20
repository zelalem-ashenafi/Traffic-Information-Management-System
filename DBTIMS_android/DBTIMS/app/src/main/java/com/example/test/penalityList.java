package com.example.test;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
import android.view.View;

import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;
import java.util.ArrayList;

import de.codecrafters.tableview.TableView;
import de.codecrafters.tableview.toolkit.SimpleTableDataAdapter;
import de.codecrafters.tableview.toolkit.SimpleTableHeaderAdapter;

public class penalityList extends AppCompatActivity {
    Database db;
    TableView tablelist;
    JSONObject jsonObject;
    JSONObject jsonPunish;
    ArrayList<String> arrDate = new ArrayList<String>();
    ArrayList<String> arrlevel = new ArrayList<String>();
    ArrayList<String> arrReason = new ArrayList<String>();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_penality_list);
        View parent = findViewById(R.id.parent);
        String driver = "";
        try {
            jsonObject = new JSONObject(getIntent().getStringExtra("jsonObject"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        try {
            driver = jsonObject.getString("license_no#0");
        } catch (JSONException e) {
            e.printStackTrace();
        }
        jsonPunish = new JSONObject();

        String url = "http://192.168.137.1/dbtims/api.php?action=select&query=select street_no,plate_no,reason,punish_date from punishment where license_no='" + driver + "'";
        System.out.println(url);

        try {
            jsonPunish = db.getJSONObjectFromURL(url);
        } catch (IOException e) {
            e.printStackTrace();
        } catch (JSONException e) {
            e.printStackTrace();
        }

        tablelist = findViewById(R.id.tableList);

        tablelist.setColumnCount(4);
        if (jsonPunish == null) {
            Snackbar.make(parent, "No data found!", Snackbar.LENGTH_LONG)
                    .setAction("Action", null).show();
        } else {
            String[] header = {"Plate No.", "Street No.", "Reason", "Date"};
            tablelist.setHeaderAdapter(new SimpleTableHeaderAdapter(this, header));
            int len = (jsonPunish.names().length()-1)/4;
            System.out.println("length: "+len);
            String[][] tableData = new String[len][4];
            for (int i = 0; i < len; i++) {

                try {
                    tableData[i][0] = jsonPunish.getString("street_no#" + i);
                    tableData[i][1] = jsonPunish.getString("plate_no#" + i);
                    tableData[i][2] = jsonPunish.getString("reason#" + i);
                    tableData[i][3] = jsonPunish.getString("punish_date#" + i);

                } catch (JSONException e) {
                    e.printStackTrace();
                }


            }

            tablelist.setDataAdapter(new SimpleTableDataAdapter(this, tableData));

        }
    }
}