package com.example.test.ui.home;
import androidx.annotation.Nullable;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.EditText;

import androidx.annotation.NonNull;
import androidx.fragment.app.Fragment;
import androidx.lifecycle.ViewModelProvider;

import com.example.test.Database;
import com.example.test.R;
import com.example.test.databinding.FragmentHomeBinding;
import com.example.test.view_driver;
import com.google.android.material.snackbar.Snackbar;

import org.json.JSONException;
import org.json.JSONObject;

import java.io.IOException;

public class HomeFragment extends Fragment {

    private FragmentHomeBinding binding;
    EditText txtID;
    Button btnSearch;
    JSONObject jsonObject;
    JSONObject jsonProfile;
    Database db=new Database();
    public View onCreateView(@NonNull LayoutInflater inflater,
                             ViewGroup container, Bundle savedInstanceState) {
        HomeViewModel homeViewModel =
                new ViewModelProvider(this).get(HomeViewModel.class);

        binding = FragmentHomeBinding.inflate(inflater, container, false);
        View root = binding.getRoot();




        return root;
    }

    @Override
    public void onViewCreated(@NonNull View view, @Nullable Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        txtID=view.findViewById(R.id.txtID);
        btnSearch=view.findViewById(R.id.btnSearch);
        try {
            jsonProfile=new JSONObject(getActivity().getIntent().getStringExtra("jsonProfile"));
        } catch (JSONException e) {
            e.printStackTrace();
        }
        btnSearch.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String strID = txtID.getText().toString();
                if (strID.equals("")) {
                    Snackbar.make(view, "Input cannot be empty!", Snackbar.LENGTH_LONG)
                            .setAction("Action", null).show();

                } else {
                    String found = "";
                    try {
                        jsonObject = new JSONObject();

                        String url = "http://192.168.137.1/dbtims/api.php?action=select&query=select * from drivers where license_no='" + strID + "'";
                        System.out.println(url);

                        jsonObject = db.getJSONObjectFromURL(url);
                    } catch (IOException e) {
                        e.printStackTrace();
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    try {
                        found = jsonObject.getString("found");
                    } catch (JSONException e) {
                        e.printStackTrace();
                    }
                    if (found.equals("1")) {

                        Intent intent = new Intent(getView().getContext(), view_driver.class);
                        intent.putExtra("jsonObject", jsonObject.toString());
                        intent.putExtra("jsonProfile", jsonProfile.toString());
                        startActivity(intent);

                    } else {
                        Snackbar.make(view, "Invalid license number!", Snackbar.LENGTH_LONG)
                                .setAction("Action", null).show();
                    }
                }
            }
        });
    }

    @Override
    public void onDestroyView() {
        super.onDestroyView();
        binding = null;
    }
}